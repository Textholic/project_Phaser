<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ URL::asset('css/app.css')}}" rel="stylesheet" type="text/css" media="all">
        <script src="{{ URL::asset('js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{ URL::asset('js/common.js')}}"></script>
        <script src="{{ URL::asset('js/phaser.min.js')}}"></script>
        <script type="text/javascript">
            var config = {
                type: Phaser.AUTO,
                width: 800,
                height: 600,
                physics: {
                    default: 'arcade',
                    arcade: {
                        gravity: { y: 200 }
                    }
                },
                scene: {
                    preload: preload,
                    create: create
                }
            };

            var game = new Phaser.Game(config);

            function preload ()
            {
                this.load.setBaseURL('http://labs.phaser.io');

                this.load.image('sky', 'assets/skies/space3.png');
                this.load.image('logo', 'assets/sprites/phaser3-logo.png');
                this.load.image('red', 'assets/particles/red.png');
            }

            function create ()
            {
                this.add.image(400, 300, 'sky');

                var particles = this.add.particles('red');

                var emitter = particles.createEmitter({
                    speed: 100,
                    scale: { start: 1, end: 0 },
                    blendMode: 'ADD'
                });

                var logo = this.physics.add.image(400, 100, 'logo');

                logo.setVelocity(100, 200);
                logo.setBounce(1, 1);
                logo.setCollideWorldBounds(true);

                emitter.startFollow(logo);
            }
        </script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
        </style>
    </head>
    <body>
    </body>
</html>
