<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>

        <!--  BREAD CUMBERS PENDING TO IMPLEMENT-->
        <!--<ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>-->

        <!-- CARDS HERE -->

        <!-- GRAPHS HERE -->

        <!-- TABLA -->
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Lista de dudas de los hermanos</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Edad del hermano/a</th>
                                <th>Tipo dispsitivo</th>
                                <th>Sistema operativo</th>
                                <th>Dudas</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Edad del hermano/a</th>
                                <th>Tipo dispsitivo</th>
                                <th>Sistema operativo</th>
                                <th>Dudas</th>
                            </tr>
                        </tfoot>
                        
                        <tbody>
                            <?php $count = 1; ?>
                            @if(count($questions)>0)
                                @foreach($questions as $question)
                                    <tr>
                                        <th scope="row">{{$count}}</th>
                                        <td>{{$question->description}}</td>

                                    </tr>
                                <?php $count++; ?>
                                @endforeach
                            @else
                                <div class="alert alert-dark" role="alert">
                                    <strong>No se han registrado dudas</strong>
                                </div>
                            @endif
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
        <!-- FIN TABLA -->

    </div>
</main>

<!--  CARDS -->
<!--<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Primary Card</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">Warning Card</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Success Card</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">Danger Card</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>-->

<!--   GRAPHS  -->
<!--<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Area Chart Example</div>
            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Bar Chart Example</div>
            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
</div>-->