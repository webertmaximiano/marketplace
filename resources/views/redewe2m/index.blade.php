@extends('redewe2m.layout.layout')
@section('content')
<main>
    <section class="bg-cplug-info presentation">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 offset-xl-2 col-xl-4 text-white text-center text-xl-left presentation-box">
                    <h1 class="exo h1-presentation">
                        Gestão Completa, Frente de Caixa PDV, Mesas e Comandas e Auto Atendimento
                    </h1>
                    <h3 class="exo subtitle-presentation">
                        Pacote completo para a gestão do seu negócio.
                    </h3>
                    <a href="https://cplug.redewe2m.com.br/" class="btn btn-outline-cplug-light mt-2">
                    Experimente grátis
                    </a>
                </div>
                <img class="img-fluid presentation-img d-none d-xl-block" src="{{url('redewe2m/images/website/home/new-presentation.png')}}" alt="Connect Plug - Produtos" title="Connect Plug - Produtos">
            </div>
        </div>
    </section>
    <section class="skewed bg-skew-secondary">
        <div class="container reverse-skewed section-padding-top product-padding-bottom">
            <div class="row effect-text-presentation">
                <div class="col text-center">
                    <h2 class="text-cplug-secondary d-none d-xl-block">
                        Faça uma consultoria <span class="text-cplug-info">Gratuita</span> conheça
                        os melhores produtos e serviços <span class="text-cplug-info">para você e para sua empresa,</span> 
                        pare de gastar comprando soluções que não atendam suas necessidades.
                    </h2>
                </div>
            </div>
            <div class="row row-margin-product">
                <img class="img-fluid cp-product" src="{{url('redewe2m/images/cp.png')}}" alt="Cplug" title="Cplug">
                <div class="col-12">
                    <h2 class="text-dark-primary text-center title">Produtos</h2>
                </div>
                <div class="col-12">
                    <h3 class="text-cplug-secondary text-center subtitle">
                        Conheça as nossas ferramentas para auxiliar no crescimento do seu estabelecimento
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item my-2 mx-auto">
                            <a class="nav-link tabs-active-css active" id="pills-erp-tab" data-toggle="pill" href="#pills-erp" role="tab" aria-controls="pills-erp" aria-selected="true" style="border: none!important">
                                <div class="card product-shadow-boxes border-0">
                                    <div class="card-body text-center">
                                        <img class="img-fluid erp" src="{{url('redewe2m/images/website/home/erp.png')}}" alt="ERP" title="ERP">
                                        <p class="text-cplug-secondary mt-2">ERP</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item my-2 mx-auto">
                            <a class="nav-link tabs-active-css" id="pills-pdv-tab" data-toggle="pill" href="#pills-pdv" role="tab" aria-controls="pills-pdv" aria-selected="false" style="border: none!important">
                                <div class="card product-shadow-boxes border-0">
                                    <div class="card-body text-center">
                                        <img class="img-fluid erp" src="{{url('redewe2m/images/website/home/cash.svg')}}" alt="PDV" title="PDV">
                                        <p class="text-cplug-secondary mt-2">PDV</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item my-2 mx-auto">
                            <a class="nav-link tabs-active-css" id="pills-table-tab" data-toggle="pill" href="#pills-table" role="tab" aria-controls="pills-table" aria-selected="false" style="border: none!important">
                                <div class="card product-shadow-boxes border-0">
                                    <div class="card-body text-center">
                                        <img class="img-fluid erp" src="{{url('redewe2m/images/website/home/dashboard.svg')}}" alt="Atendimento de Mesas" title="Atendimento de Mesas">
                                        <p class="text-cplug-secondary mt-2">Atendimento de Mesas</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item my-2 mx-auto">
                            <a class="nav-link tabs-active-css" id="pills-attendance-tab" data-toggle="pill" href="#pills-attendance" role="tab" aria-controls="pills-attendance" aria-selected="false" style="border: none!important">
                                <div class="card product-shadow-boxes border-0">
                                    <div class="card-body text-center">
                                        <img class="img-fluid erp" src="{{url('redewe2m/images/website/home/attendance.png')}}" alt="Auto Atendimento" title="Auto Atendimento">
                                        <p class="text-cplug-secondary mt-2">Auto Atendimento</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-md-6 my-auto">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-erp" role="tabpanel" aria-labelledby="pills-erp-tab">
                            <div class="row px-2">
                                <div class="col">
                                    <h2 class="text-cplug-info">Gestão</h2>
                                    <p class="py-1">
                                        Com nosso sistema de gestão - ERP, você tem uma super ferramenta para gerenciar toda sua empresa,
                                        desde estoque, contas a pagar e receber, notas fiscais, uma infinidade de relatórios e muitos outros
                                        módulos para ajudar no controle de sua empresa.
                                    </p>
                                    <a href="{{url('/cadastre-se')}}" class="btn btn-cplug-info">
                                    Consultoria Gratuita
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-pdv" role="tabpanel" aria-labelledby="pills-pdv-tab">
                            <div class="row px-2">
                                <div class="col">
                                    <h2 class="text-cplug-info">PDV</h2>
                                    <p class="py-1">
                                        Nosso sistema frente de caixa PDV permite você realizar suas vendas de forma rápida e organizada, criando um padrão de operação para seu negócio, evitando erros e aumentando seu controle sobre suas vendas.
                                    </p>
                                    <a href="{{url('/cadastre-se')}}" class="btn btn-cplug-info">
                                    Consultoria Gratuita
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-table" role="tabpanel" aria-labelledby="pills-table-tab">
                            <div class="row px-2">
                                <div class="col">
                                    <h2 class="text-cplug-info">Atendimento de Mesas e Comandas</h2>
                                    <p class="py-1">
                                        Com esse módulo de Atendimento de Mesas e Comandas, você pode organizar e agilizar seu atendimentos de inúmeras maneiras, desde controlar um restaurante, uma padaria, uma cafeteria e até mesmo uma papelaria! Você realiza o pedido do seu cliente antecipadamente e depois finaliza a conta no caixa!
                                    </p>
                                    <a href="{{url('/cadastre-se')}}" class="btn btn-cplug-info">
                                    Consultoria Gratuita
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-attendance" role="tabpanel" aria-labelledby="pills-attendance-tab">
                            <div class="row px-2">
                                <div class="col">
                                    <h2 class="text-cplug-info">Auto Atendimento</h2>
                                    <p class="py-1">
                                        Já pensou no quanto você pode economizar com um Auto Atendimento? Além de economizar, criar uma experiência única para seu cliente! E ainda tudo integrado em um sistema único em que você mesmo pode gerenciar tudo e acompanhar suas vendas? Sim, nós temos essa solução para você ;)
                                    </p>
                                    <a href="{{url('/cadastre-se')}}" class="btn btn-cplug-info">
                                    Consultoria Gratuita
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <section class="skewed bg-white">
        <div class="container reverse-skewed section-padding-top">
            <div class="row">
                <div class="col py-5">
                    <img class="img-fluid cp-product" src="{{url('redewe2m/images/cp.png')}}" alt="Cplug" title="Cplug">
                    <div class="col-12">
                        <h2 class="text-dark-primary text-center title title-lg">
                            Além de tudo isso, você tem mais vantagens!
                        </h2>
                    </div>
                    <div class="col-12">
                        <h3 class="text-cplug-secondary text-center subtitle">
                            Estamos presente em TODOS os estados brasileiros! Confie em quem atende o Brasil inteiro!
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 col-md-6 col-lg-5 py-3">
                    <div class="card card-benefits update-img">
                        <div class="card-body px-1 py-0">
                            <div class="row">
                                <div class="offset-4 col-8">
                                    <h3 class="card-benefits-title pt-3">
                                        Atualizações
                                    </h3>
                                    <p class="card-benefits-description">
                                        Tenha sempre as últimas atualizações de forma totalmente automática e sem nenhum custo adicional.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-md-6 col-lg-5 py-3">
                    <div class="card card-benefits cloud-img">
                        <div class="card-body px-1 py-0">
                            <div class="row">
                                <div class="offset-4 col-8">
                                    <h3 class="card-benefits-title pt-3">
                                        Nuvem
                                    </h3>
                                    <p class="card-benefits-description">
                                        Economize em infraestrutura, deixe-nos cuidar dessa parte para você.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 col-md-6 col-lg-5 py-3">
                    <div class="card card-benefits wifi-img">
                        <div class="card-body px-1 py-0">
                            <div class="row">
                                <div class="offset-4 col-8">
                                    <h3 class="card-benefits-title pt-3">
                                        Mobilidade
                                    </h3>
                                    <p class="card-benefits-description">
                                        Acesse os dados da sua empresa de qualquer lugar e a qualquer hora, seja através de um computador ou pelo seu smartphone.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-md-6 col-lg-5 py-3">
                    <div class="card card-benefits monetization-img">
                        <div class="card-body px-1 py-0">
                            <div class="row">
                                <div class="offset-4 col-8">
                                    <h3 class="card-benefits-title pt-3">
                                        Economia
                                    </h3>
                                    <p class="card-benefits-description">
                                        Economize! Não gaste com backups e energia elétrica a infraestrutura fica conosco.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row benefits-margin">
                <div class="col text-center">
                    <a href="{{url('/cadastre-se')}}" class="btn btn-cplug-info">
                    Fale Conosco! Diga suas necessidades
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="skewed bg-cplug-info support">
        <div class="container reverse-skewed" style="padding-bottom: 60px">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-5 text-white my-auto">
                    <h2 class="support-title mb-2">
                        Suporte 7 dias por semana!
                    </h2>
                    <p class="">
                        Nós estamos aqui para te ajudar de domingo a domingo! Além disso, nós somos a única empresa que te liga, em vez de você ficar aguardando no telefone, gastando com ligações, basta informar seu telefone que nós ligamos para você =). Simples assim!.
                    </p>
                    <a href="{{url('/cadastre-se')}}" class="btn btn-outline-cplug-light btn-support-exception">
                    Conheça agora
                    </a>
                </div>
                <div class="col-lg-7 my-auto">
                    <img class="img-fluid mx-auto d-none d-lg-block" src="{{url('redewe2m/images/website/home/support.png')}}" alt="Suporte" title="Suporte 7 dias por semana!">
                </div>
            </div>
        </div>
    </section>
    <section class="skewed bg-white">
        <div class="container reverse-skewed section-padding-top all-you-need-padding">
            <div class="row py-5">
                <img class="img-fluid cp-product" src="{{url('redewe2m/images/cp.png')}}" alt="Cplug" title="Cplug">
                <div class="col-12">
                    <h2 class="text-dark-primary text-center title title-lg">Nós temos tudo que você precisa!</h2>
                </div>
                <div class="col-12">
                    <h3 class="text-cplug-secondary text-center subtitle">
                        Uma solução completa para seu negócio
                    </h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 col-lg-5 p-4 my-auto mr-lg-5">
                    <h2 class="text-cplug-info all-you-need-title">
                        Um sistema, uma equipe e apenas uma fatura ;)
                    </h2>
                    <p class="my-2">
                        Esqueça essa ideia de ter vários sistemas, nós entregamos uma solução única.
                    </p>
                    <p>
                        Somos uma das poucas empresas do Brasil que oferece Gestão + PDV + Autoatendimento.
                    </p>
                    <a href="https://cplug.redewe2m.com.br/" class="btn btn-cplug-info">
                    Saiba mais
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-4 px-4 px-lg-2 py-4">
                    <div class="card border-0 shadow rounded-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col d-inline-flex">
                                    <img class="img-fluid all-you-need-img" src="{{url('redewe2m/images/website/home/cash.svg')}}" alt="PDV - Frente de Caixa" title="PDV - Frente de Caixa">
                                    <span class="ml-3 all-you-need-span my-auto">
                                    PDV - Frente de Caixa
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-inline-flex">
                                    <img class="img-fluid all-you-need-img" src="{{url('redewe2m/images/website/home/dashboard.svg')}}" alt="Atendimento" title="Atendimento">
                                    <span class="ml-3 all-you-need-span my-auto">
                                    Atendimento
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-inline-flex">
                                    <img class="img-fluid all-you-need-img" id="all-you-need-attendance-img" src="{{url('redewe2m/images/website/home/attendance.png')}}" alt="Auto Atendimento" title="Auto Atendimento">
                                    <span class="ml-3 all-you-need-span my-auto">
                                    Autoatendimento
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-inline-flex">
                                    <img class="img-fluid all-you-need-img" src="{{url('redewe2m/images/website/home/erp.png')}}" alt="Gestão" title="Gestão">
                                    <span class="ml-3 all-you-need-span my-auto">
                                    Gestão
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-inline-flex">
                                    <img class="img-fluid all-you-need-img" src="{{url('redewe2m/images/website/home/clock.png')}}" alt="Suporte 7 dias por semana" title="Suporte 7 dias por semana">
                                    <span class="ml-3 all-you-need-span my-auto">
                                    Suporte 7 dias
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <section class="lets-begin">
        <div class="container">
            <div class="row justify-content-center">
                <img class="img-fluid cp-product" src="{{url('redewe2m/images/cp.png')}}" alt="Cplug" title="Cplug">
                <div class="col-12">
                    <h2 class="text-dark-primary text-center title">Vamos conversar?</h2>
                </div>
                <div class="col-12">
                    <h3 class="text-dark text-center subtitle title-begin">
                        VOCÊ DIZ O QUE PRECISA, TESTA ANTES, SEM CUSTO.
                    </h3>
                    <div class="text-center">
                        <a href="{{url('/cadastre-se')}}" class="btn-cplug-info rounded mt-4 text-decoration-none">
                        Consultoria grátis
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('redewe2m.layout.footer')
    
</main>

@endsection