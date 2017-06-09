<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use Auth;
use App\Aeronave as Aeronave;
use Gbrock\Table\Facades\Table;
use Validator;
class AeronavesController extends Controller {

    public function lista() {
        $sort  = Request::input('sort');
        $order = Request::input('order');
        $query = $this->filtra();

        $query->where('status', '=', 'D');

        if (!empty($sort) && !empty($order)) {
            Request::session()->put('order', $order);
            Request::session()->put('sort', $sort);
        } else {
            $sort  = Request::session()->get('sort');
            $order = Request::session()->get('order');
        }

        Request::flash();
        if (!empty($sort) && !empty($order)) {
            switch ($sort) {
                case 'Modelo':
                    $sortModelo = $order;
                    $resposta   = $query->orderBy($sort, $order)->get();
                    return view('aeronaves.busca')->with('aeronaves', $resposta)->with('sortModelo', $sortModelo);
                    break;
                case 'valor':
                    $sortPreco = $order;
                    $resposta  = $query->orderBy($sort, $order)->get();
                    return view('aeronaves.busca')->with('aeronaves', $resposta)->with('sortPreco', $sortPreco);
                    break;
                case 'Ano':
                    $sortAno  = $order;
                    $resposta = $query->orderBy($sort, $order)->get();
                    return view('aeronaves.busca')->with('aeronaves', $resposta)->with('sortAno', $sortAno);
                    break;
                default:
                    $resposta = $query->get();
                    return view('aeronaves.busca')->with('aeronaves', $resposta);
                    break;
            }
        } else {
            $aeronaves = $query->get();
            return view('aeronaves.busca')->with('aeronaves', $aeronaves);
        }
    }


    private function filtra() {
        $request = Request::all();
        if (array_key_exists('modelo', $request)) {
            Request::session()->put('query', $request);
            return Aeronave::filter($request);
        } else {
            if (!empty(Request::session()->get('query'))) {
                $request = Request::session()->get('query');
            }
            return Aeronave::filter($request);
        }
    }


    public function limpaFiltro() {
        Request::session()->forget('order');
        Request::session()->forget('sort');
        Request::session()->forget('query');
        return redirect('/aeronaves/busca');
    }


    public function busca($id) {
        $resposta = Aeronave::with('vendedor')->where('id', $id)->get();
        if (empty($resposta)) {
            return "Esta aeronave não existe";
        } else {
            return view('aeronaves.detalhes')->with('acft', $resposta[0]);
        }
    }


    public function showNovoAeronaveForm() {
        if (!Auth::check() || Auth::user()->tipo != 'J') {
            Request::session()->flash('alert-warning', 'Você deve estar logado em uma conta de <strong>Vendedor</strong> para realizar o cadastro de novas aeronaves no sistema');
            return redirect('/');
        } else {
            return view('aeronaves.novo');
        }
    }


    public function adiciona() {
        $rules       = array(
            'modelo' => 'string|required|min:5',
            'descricao' => 'string|required|min:20|max:400',
            'valor' => 'required|numeric',
            'ano' => 'required|numeric',
            'link_img' => 'active_url',
            'tipomotor' => 'required',
            'numeromotor' => 'nullable',
            'hvoo' => 'required|numeric'
        );
        $messages    = array(
            'required' => 'O campo :attribute é de preenchimento obrigatório',
            'min' => 'O campo :attribute deve conter entre :min e :max caracteres',
            'max' => 'O campo :attribute deve conter entre :min e :max caracteres',
            'required' => 'O campo :attribute é de preenchimento obrigatório',
            'numeric' => 'O campo :attribute deve conter apenas números',
            'active_url' => 'O campo não é um link válido para uma imagem'
        );
        $validator   = Validator::make(Request::all(), $rules, $messages);
        $modelo      = Request::input('modelo');
        $descricao   = Request::input('descricao');
        $valor       = Request::input('valor');
        $ano         = Request::input('ano');
        $link_img    = Request::input('link_img');
        $tipomotor   = Request::input('tipomotor');
        $numeromotor = Request::input('numeromotor', null);
        $hvoo        = Request::input('hvoo');
        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect('/aeronaves/novo')->withInput()->withErrors($validator);
        } else {
            $novaAeronave            = new Aeronave;
            $novaAeronave->modelo    = $modelo;
            $novaAeronave->descricao = $descricao;
            $novaAeronave->valor     = $valor;
            $novaAeronave->ano       = $ano;
            if (!empty($link_img))
                $novaAeronave->link_img = $link_img;
            $novaAeronave->tipomotor   = $tipomotor;
            $novaAeronave->numeromotor = $numeromotor;
            $novaAeronave->hvoo        = $hvoo;
            $novaAeronave->user_id     = Auth::user()->id;
            //dd($novaAeronave);
            $novaAeronave->save();
            return redirect('/aeronaves')->with('novaAeronave', $novaAeronave);
        }
    }


    public function showMinhasAeronavesForm() {
        $user_id  = Auth::user()->id;
        $resposta = Aeronave::with('vendedor')->where('user_id', $user_id)->get();
        //return view('aeronaves.addbyme')->with('aeronaves', $resposta);
        $sort     = Request::input('sort');
        $order    = Request::input('order');
        $query    = $this->filtraAddByMe($user_id);
        if (!empty($sort) && !empty($order)) {
            Request::session()->put('order', $order);
            Request::session()->put('sort', $sort);
        } else {
            $sort  = Request::session()->get('sort');
            $order = Request::session()->get('order');
        }
        Request::flash();
        if (!empty($sort) && !empty($order)) {
            switch ($sort) {
                case 'Modelo':
                    $sortModelo = $order;
                    $resposta   = $query->orderBy($sort, $order)->get();
                    return view('aeronaves.addbyme')->with('aeronaves', $resposta)->with('sortModelo', $sortModelo);
                    break;
                case 'valor':
                    $sortPreco = $order;
                    $resposta  = $query->orderBy($sort, $order)->get();
                    return view('aeronaves.addbyme')->with('aeronaves', $resposta)->with('sortPreco', $sortPreco);
                    break;
                case 'Ano':
                    $sortAno  = $order;
                    $resposta = $query->orderBy($sort, $order)->get();
                    return view('aeronaves.addbyme')->with('aeronaves', $resposta)->with('sortAno', $sortAno);
                    break;
                default:
                    $resposta = $query->get();
                    return view('aeronaves.addbyme')->with('aeronaves', $resposta);
                    break;
            }
        } else {
            $aeronaves = $query->get();
            return view('aeronaves.addbyme')->with('aeronaves', $aeronaves);
        }
    }


    private function filtraAddByMe($user_id) {
        $request = Request::all();
        if (array_key_exists('modelo', $request)) {
            Request::session()->put('queryme', $request);
            return Aeronave::where('user_id', $user_id)->filter($request);
        } else {
            if (!empty(Request::session()->get('queryme'))) {
                $request = Request::session()->get('queryme');
            }
            return Aeronave::where('user_id', $user_id)->filter($request);
        }
    }


    public function showAeronavesEditForm($id) {
        $aeronave = Aeronave::find($id);
        if (empty($aeronave)) {
            return "Esta aeronave não existe";
        } else {
            return view('aeronaves.edit')->with('acft', $aeronave);
        }
    }


    public function update(){
            
            $id = Request::input('_id');
            $aeronave = Aeronave::find($id);
         
            $aeronave->modelo    = Request::input('modelo');
            $aeronave->descricao = Request::input('descricao');
            $aeronave->valor     = Request::input('valor');
            $aeronave->ano       = Request::input('ano');
            if (!empty($link_img))
                $aeronave->link_img = Request::input('link_img');
            $aeronave->tipomotor   = Request::input('tipomotor');
            $aeronave->numeromotor = Request::input('numeromotor');
            $aeronave->hvoo        = Request::input('hvoo');
            
            
            $aeronave->save();            
            return redirect('/aeronaves/addbyme');
    }
    

     public function limpaFiltroByMe() {
        Request::session()->forget('order');
        Request::session()->forget('sort');
        Request::session()->forget('queryme');
        return redirect('/aeronaves/addbyme');
    }




}
