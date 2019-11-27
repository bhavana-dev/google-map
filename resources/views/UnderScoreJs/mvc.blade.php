@extends('layouts.app')

@section('content')

        <input type="text" id="inputtext" name="inputtext" value="" />
        <input type="button" id="fillbutton" value="Fill with Text"/>
        <input type="button" id="clearbutton" value="Clear"/>
        <input type="button" id="clusterDiv" value="clusterDiv"/>

        <!-- Using function returning an Object literal (my preference) -->
        <!-- <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script> -->
        <script src="{{asset('js/underscore-min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/controllers/FormController_literal.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/models/FormModel_literal.js')}}"></script>
 
        <!-- Using Prototype -->
        <!--<script type="text/javascript" src="js/controllers/FormController_prototype.js" ></script>-->
        <!--<script type="text/javascript" src="js/models/FormModel_prototype.js"></script>-->
 
        <script type="text/javascript">
            
            function ready() {

                new FormController().init();
            }

            document.addEventListener("DOMContentLoaded", ready);
 
        </script>
@endsection