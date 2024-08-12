<style>
    .container {
        margin-top: 20px;

    }
    .card {
        border: 1px solid #ddd;
        border-radius: 0.375rem;
        padding: 20px;

    }
    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #ddd;
        padding: 10px 20px;
        font-size: 1.25rem;
        font-weight: 500;

    }
    .dl-horizontal dt {
        width: 25%;
        float: left;
        clear: left;
        text-align: right;
        padding-right: 10px;
        font-weight: bold;

    }
    .dl-horizontal dd {
        margin-left: 0;
        margin-bottom: 10px;
        line-height: 1.5;

    }
</style>
<div class="container" style="width: 600px;">
    <div class="card">
        <div class="card-header">
            Detalhes do Plano de Férias
        </div>
        <div class="card-body">
            <dl class="row dl-horizontal">
                <dt class="col-sm-3">ID:</dt>
                <dd class="col-sm-9">{{ $tarefa->id }}</dd>

            <dt class="col-sm-3">Título:</dt>
            <dd class="col-sm-9">{{ $tarefa->tarefa_titulo }}</dd>

        <dt class="col-sm-3">Descrição:</dt>
        <dd class="col-sm-9">{{ $tarefa->tarefa_descricao }}</dd>

    <dt class="col-sm-3">Local:</dt>
    <dd class="col-sm-9">{{ $tarefa->tarefa_local }}</dd>

<dt class="col-sm-3">N° de Participantes:</dt>
<dd class="col-sm-9">{{ $tarefa->tarefa_num_participantes }}</dd>

<dt class="col-sm-3">Criado em:</dt>
<dd class="col-sm-9">{{ $tarefa->created_at }}</dd>
</dl>
</div>
</div>
</div>