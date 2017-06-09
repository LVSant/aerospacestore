<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Request;
use App\Aeronave;
use App\User;
use App\Mail\NegociacaoAeronave;
use App\Mail\VendaCancelada;
use App\Mail\VendaFinalizada;
use Mail;
use App\Compra;

use Illuminate\Support\Facades\DB;


class CompraController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Compra  Controller
    |--------------------------------------------------------------------------
    |
    | stuff about buying
    */
    
    
  
    
    public function showAeronavesCompraForm($id) {
        
        $acft = Aeronave::find($id);
        
        //Dono da aeronave querendo comprar o próprio aviao, leva pra edição
        if ($acft->user_id == Auth::user()->id) {
            return view('aeronaves.edit')->with('acft', $acft);
        }
        
        
        return view('aeronaves.compra')->with('acft', $acft);
    }
    
    
    public function comunicaVendedor($idComprador, $aeronave) {
        $comprador = User::find($idComprador);
                
        Mail::to($comprador->email)->send(new NegociacaoAeronave($aeronave->modelo));
    }
    
    public function compra($idAeronave) {

        $aeronave   = Aeronave::with('vendedor')->where('id', $idAeronave)->get();
        $idVendedor = $aeronave[0]->vendedor->id;
        $idComprador = Auth::user()->id;
        
        $existeCompra = Compra::where(['id_vendedor' => $idVendedor, 'id_comprador' => $idComprador, 'id_aeronave' => $idAeronave, 'status' => 'I', 'status' => 'C', 'status' => 'F', 'status' => 'V'])->get();

        if(count($existeCompra) >= 1){
            return $this->minhasCompras();
        }else{    

        //envia email ao vendedor avisando do interesse de compra
        $this->comunicaVendedor($idVendedor, $aeronave[0]);

        $mensagem = "O usuário ".Auth::user()->name." declarou interesse pela aeronave ". $aeronave[0]->modelo;
        
        $compra = new Compra;
        $compra->id_comprador = $idComprador;
        $compra->id_vendedor = $idVendedor;
        $compra->id_aeronave = $idAeronave;
        $compra->status = 'V';
        $compra->mensagem = $mensagem;

        $compra->save();
        
        return $this->negociacao($compra->id);
        //return view('aeronaves.negociacao')->with('acft', $aeronave[0])->with('compra', $compra);
        
        }
    }

    public function negociacao($id){
        $compra = Compra::find($id);

        $comprador = User::find($compra->id_comprador);
        $acft = Aeronave::find($compra->id_aeronave);

        return view('aeronaves.negociacao')->with('comprador', $comprador)->with('acft', $acft)->with('compra', $compra);

    }


    public function listaCompras(){

        $compras = Compra::with('aeronave')->where('id_vendedor', Auth::user()->id)->orderBy('status', 'desc')->get();
        return view('aeronaves.pendente')->with('compras', $compras);

    }

    public function minhasCompras(){
        $compras = Compra::with('aeronave')->where('id_comprador', Auth::user()->id)->orderBy('status', 'desc')->get();

       

        return view('aeronaves.minhascompras')->with('compras', $compras);


    }

    public function confirmacompra($id){
        $compra = Compra::find($id);

        $compra->status = 'F';
        $compra->mensagem = 'A compra foi confirmada pelo usuário '.Auth::user()->name;
        $compra->save();


        $aeronave = Aeronave::find($compra->id_aeronave);
        $aeronave->status = 'V';
        $aeronave->save();

        $this->comunicaVendaFinalizada($id);

        return redirect('aeronaves');
    }


    public function cancelacompra($id){
        $compra = Compra::find($id);
        
        $compra->mensagem = 'Compra cancelada pelo usuário '.Auth::user()->name;
        $compra->status = 'D'; //cancelada


        $aeronave = Aeronave::find($compra->id_aeronave);
        $aeronave->status = 'D'; //disponivel
        $aeronave->save();

        $compra->update();

        $this->comunicaVendaCancelada($id);
        return redirect('aeronaves');

    }

     public function comunicaVendaCancelada($idCompra) {
        $compra = Compra::find($idCompra);
        $idcomprador = $compra->id_comprador;
        $idvendedor = $compra->id_vendedor;
        $aeronave = Aeronave::find($compra->id_aeronave);

        $login = User::find($idcomprador)->email;
        
        $vendedor = User::find($idvendedor)->name;

        Mail::to($login)->send(new VendaCancelada($vendedor, $aeronave->modelo));
    }

    public function comunicaVendaFinalizada($idCompra) {
        $compra = Compra::find($idCompra);
        $idcomprador = $compra->id_comprador;
        $idvendedor = $compra->id_vendedor;
        $aeronave = Aeronave::find($compra->id_aeronave);

        $login = User::find($idcomprador)->email;
        
        $vendedor = User::find($idvendedor)->name;
                
        Mail::to($login)->send(new NegociacaoAeronave($vendedor, $aeronave->modelo));
    }
}
