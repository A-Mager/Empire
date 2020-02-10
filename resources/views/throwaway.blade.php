<body>
<!-- TODO implement Bulma tile styling for a cleaner look -->
<div id="wrapper" class="">
    <div id="page" class="columns is-vcentered is-centered page">
        <div id="info" class="column is-one-quarter has-background-grey-light has-text-white">
            <p>Dummy text</p>
            <br/>
            <p>More dummy text</p>
            <br/>
            <p>Guess what sucker, more dummy text</p>
        </div>

        <div id="form" class="column bd-notification is-one-quarter has-background-grey-light">
            <header><bold>Neem contact</bold></header>

            <form action="/send" method="POST">
                @csrf

                <div class="field">

                    <label class="label"for="name">Naam</label>

                    <div class="control">
                        <input type="text" class="input" name="name" id="name" required>
                    </div>

                </div>

                <div class="field">

                    <label for="email" class="label">Email</label>

                    <div class="control">
                        <input type="email" class="input" name="email" id="email"required>
                    </div>
                </div>

                <div class="field">

                    <label for="phone" class="label">Telefoon</label>

                    <div class="control">
                        <input type="tel" class="input" name="phone" id="phone" required>
                    </div>
                </div>

                <div class="field">

                    <label for="subject" class="label">Onderwerp</label>

                    <div class="control">
                        <input type="text" class="input" name="subject" id="subject" required>
                    </div>
                </div>

                <div class="field">

                    <label for="message" class="label">Bericht</label>

                    <div class="control">
                        <textarea class="textarea" name="content" id="content" required></textarea>
                    </div>
                </div>

                {{--                        TODO implement Captcha verification         --}}
                <div class="field">
                    <div class="g-recaptcha" data-sitekey="6LfavdYUAAAAANH2Nx_Hd5kMWMLTf0MRDOnmfuK9"></div>
                </div>

                <div class="field is-grouped">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
            </form>
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
