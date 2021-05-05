@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
{{--
    <h1>Dashboard</h1> --}}

@stop
<style type="text/css" media="screen">
    th{
        background-color: rgba(0,0,0,.03);
    }
    .card-header{
        background-color: rgba(0,0,0,0) !important;
    }
    #card1{
        width: 90%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        background-image: linear-gradient(#ffc107,#f39c12);
    }
</style>

@section('content')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div align="center">
                             <h3><b>Book Review Site</b></h3><br>
                             <b>📓📗📔   📓📗📔   📓📗📔   📓📗📔   📓📗📔  📓📗📔</b>
                           
                        </div>

                        <br>
                    </div>
                    <div class="card-body" align="center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    
        <div class="row text-center" style="margin-top:40px">
        <div class="col-lg-3 col-md-3 col-xs-6"></div>
        <div class="col-lg-3 col-md-3 col-xs-6">
                    <div class="small-box text-center" id="card1">
                    <div class="inner">
                                <div class="row text-center">
                                    <div class="col-md-12">
                                    <h1 style="font-size:15px"><b>Total Book </b></h1>
                                    </div>
                                     <div class="col-md-12 text-center">
                                        <p style="font-size: 23px;color:white;">
                                          3
                                        </p> 
                                    </div> 
                                </div> 
                        </div> 
                    <a href="book" class="small-box-footer" id="footer_card">More info <i class="fa fa-fw fa-arrow-right"></i></a>
                    </div>
        </div>
        <div class="col-lg-3 col-md-3 col-xs-6">
                    <div class="small-box text-center" id="card1">
                    <div class="inner">
                                <div class="row text-center">
                                    <div class="col-md-12">
                                    <h1 style="font-size:15px"><b>Total Review </b></h1>
                                    </div>
                                     <div class="col-md-12 text-center">
                                        <p style="font-size: 23px;color:white;">
                                          3
                                        </p> 
                                    </div> 
                                </div> 
                        </div> 
                    <a href="review" class="small-box-footer" id="footer_card">More info <i class="fa fa-fw fa-arrow-right"></i></a>
                    </div>
        </div>
        </div> 
@stop



@section('css')



@stop



@section('js')

    <script> console.log('Admin Dashboard!'); </script>

@stop
