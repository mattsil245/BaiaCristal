@extends('layouts.app')

@section('title', 'Home')

@section('content')
<style>
.containerCadastro {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width: 100%;
    min-height: 70vh;
}
.cardCadastro{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 1rem;
    width: 100%;
    padding: 2rem; 
    border-radius: 10px;
}
    .formulario{
        height: auto;
        width: 40%;
        min-height: 100%;
        display: flex;
        flex-direction: column;
    }
    .linha {
    display: flex;
    flex-direction: row;
    gap: 1rem;
    width: 100%;
    margin-top: 1rem;
}

.alinha {
    display: flex;
    flex-direction: column;
    flex: 1;
    height: 100%;
}
.input {
    border: 2px solid rgb(122, 122, 122);
    border-radius: 5px;
    width:100%;
    height: 2.6rem;
    padding: 6px;
    /* margin-top: 2rem; */
    font-size: 17px;
    text-indent: 3%;
    /* box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); */ 
}
 .btnProduto {
        background-color:rgb(34, 194, 119);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        cursor: pointer;
        text-align: center;
        width: 100%;
    }
    #btnCancelar {
        background-color:rgb(104, 104, 104);
    }
     #btnCancelar:hover {
        background-color:rgb(71, 71, 71);
    }
      #btnCadastrar {
        background-color:rgb(60, 236, 54);
    }
     #btnCadastrar:hover {
        background-color:rgb(62, 175, 17);
    }
</style>
<div class="containerCadastro">
    <div class="titulo">
        <h1>Cadastre-se</h1>
    </div>
    <div class="cardCadastro">
            <div class="formulario">
                    <div class="linha">
                        <div class="alinha">
                            <label>Nome:</label> 
                            <input class="input" name="nome" type="text" id="input_Nome" placeholder="Seu Nome"required/>
                        </div>
                    </div>
                    <div class="linha">
                        <div class="alinha">
                            <label>Email:</label> 
                            <input class="input" name="email" type="email" id="input_Email" placeholder="Seu E-mail" required/>
                        </div>
                    </div>
                     <div class="linha">
                        <div class="alinha">
                            <label>Senha:</label>
                            <input class="input" name="senha" type="password" id="input_Senha" placeholder="Sua Senha" required/>
                        </div>
                    </div>
                    <div class="linha">
                   <div class="btnProduto" id="btnCadastrar">
            Cadastrar
        </div>
        <div class="btnProduto" id="btnCancelar">
            Cancelar
        </div>
    </div>
  </div>
</div>
  

@endsection