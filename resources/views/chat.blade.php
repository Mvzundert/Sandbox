@extends('layouts.app')

@section('content')
    <div id="app" class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Chat</div>
                    <div class="panel-body">
                        <chat-log :messages="messages"></chat-log>
                        <chat-composer v-on:messageSent="addMessage"></chat-composer>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
