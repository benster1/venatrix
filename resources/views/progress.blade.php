@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                
                       <div class="panel-heading">
                    <div align="center">
                <div class="alert panel-default" role="alert">
                                    <h3> Site Map Generated Succesfuly</h3>
                        </div>

                        <div width='90%' >
                        <img width="40%" src="/img/suucess-circle.gif">
                        </div>
                            <a href="/actionTC/{{$TestCase}}?action=0/" ><img width="2%" src="/img/back.png"></a>
                            <a href="/home" ><img width="5%" src="/img/home.png"></a>

                        </div>
                </div>
            </div>
        </div>

@endsection
