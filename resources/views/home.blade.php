@extends('adminlte::page')

@section('title', 'K&M financeiro')

@section('content_header')
<div class="row align-items-center">
    <div class="col-md-9">
        <h1 class="m-0 text-dark">Dashboard</h1>
    </div>
    <div class="col-md-3">
        <form method="GET" action="">
            <select onchange="this.form.submit();" name="interval" id="" class="float-md-right custom-select">
                <option selected="&quot;selected&quot;" value="30">Relatório diário</option>
                <option value="60">Relatório mensal</option>
                <option value="90">Relatório bimestral</option>
                <option value="120">Relatório trimestral</option>
                <option value="120">Relatório semestral</option>
                <option value="120">Relatório anual</option>
            </select>
        </form>
    </div>
</div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="small-box bg-warning">
                        <div class="inner text-white">
                            <h3>3</h3>
                            <p>Fornecedores</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-suitcase"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>R$12.500,00</h3>
                            <p>Contas à receber</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-fw fa-heart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>R$0,00</h3>
                            <p>Contas à pagar</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-fw fa-user"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
