<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contact</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.0/css/bulma.css"/>
        <link href="/css/app.css" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>



    </head>
    <body>
    <section class="hero is-small is-primary is-fullwidth has-background-black">
        <div class="hero-body">
            <figure class="image container header-img is-hidden-touch">
                <img src="images/empire-logo.jpg"/>
            </figure>
            <div class="container has-text-centered is-hidden-desktop">
                <p class="title">
                    Empire Entertainment
                </p>
            </div>
        </div>

    </section>
    <div class="container page-content" >
        <div class="tile is-ancestor">
            <div class="tile is-horizontal">
                <div class="tile is-parent is-6">
                    <div class="tile is-child box">
                        <!-- Text aspect of the website -->
                        <h1 class="title is-4"><strong>Empire entertainment</strong></h1>
                        <p>
                            Empire Events & Entertainment is dé totaalpartner op het gebied van evenementen, entertainment en producties.
                            U bent bij ons aan het juiste adres voor de verbinding tussen uw wensen en de perfecte uitkomst waar uw gasten nog lang over zullen napraten.
                        </p>
                        <br/>
                        <p>
                            Meerwaarde creëren voor onze klanten; dáár zetten we ons elke dag vol enthousiasme voor in bij Empire Events & Entertainment.
                            Als totaalaanbieder ontzorgt Empire Events & Entertainment haar klanten; voor u dus niets anders dan volop genieten!
                            Onze kracht ligt in de magische wijze waarop verschillende elementen, veelal in eigen huis, met elkaar worden gecombineerd.
                        </p>
                        <br/>
                        <p>
                            Bent u op zoek naar passend entertainment? Een winkelcentrum met een wens voor een geheel op maat samengesteld programma?
                            Kunt u professionele ondersteuning gebruiken bij uw te organiseren event? Chroom niet om voor onze diensten en producten contact met ons op te nemen.
                            Wij staan graag voor u klaar!
                        </p>
                        <br/>
                        <h1 class="title is-6">Contact info</h1>
                        <p>Neem direct contact op of verstuur een verzoek met het formulier!</p><br/>
                        <div class="box">
                            <article class="media">
                                <div class="media-left">
                                    <figure class="image is-64x64">
                                        <img src="images/empire-logo.jpg" alt="Image">
                                    </figure>
                                </div>
                                <div class="media-content">
                                    <div class="content">
                                        <p>
                                            <strong>Adres:</strong> Lionstraat 6 B, 5831AK Boxmeer
                                        </p>
                                        <p>
                                            <strong>Tel.:</strong> 0485 - 35 09 08
                                        </p>
                                    </div>

                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="tile is-parent">
                    <div class="tile is-child box">
                        <!-- Form aspect of the website. -->
                        <h1 class="title is-4"><strong>Neem contact</strong></h1>

                        <form action="/" method="POST">
                            @csrf

                            <div class="field">

                                <label class="label"for="name">Naam</label>

                                <div class="control">
                                    <input type="text" class="input" name="name" id="name" required>
                                    <p class="help is-danger">{{ $errors->first('name') }}</p>
                                </div>

                            </div>

                            <div class="field">

                                <label for="email" class="label">Email</label>

                                <div class="control">
                                    <input type="email" class="input" name="email" id="email"required>
                                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                                </div>
                            </div>

                            <div class="field">

                                <label for="phone" class="label">Telefoon</label>

                                <div class="control">
                                    <input type="tel" class="input" name="phone" id="phone" required>
                                    <p class="help is-danger">{{ $errors->first('phone') }}</p>
                                </div>
                            </div>

                            <div class="field">

                                <label for="subject" class="label">Onderwerp</label>

                                <div class="control">
                                    <input type="text" class="input" name="subject" id="subject" required>
                                    <p class="help is-danger">{{ $errors->first('subject') }}</p>
                                </div>
                            </div>

                            <div class="field">

                                <label for="message" class="label">Bericht</label>

                                <div class="control">
                                    <textarea class="textarea has-fixed-size" name="content" id="content" required></textarea>
                                    <p class="help is-danger">{{ $errors->first('content') }}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                                <span class="help is-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                            </div>

                            <div class="field is-grouped">
                                <button class="button is-link" type="submit">Verstuur</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


        <!-- If email was sent succesfully, call a SWAL2 response for user validation -->
        @if(session('message'))
            <script>
                Swal.fire(
                    '{{session('message')}}',
                    'We zullen zo snel mogelijk contact leggen.',
                    'success'
                )
            </script>


        @endif
    </body>
</html>
