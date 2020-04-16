<style>
    body {
        background: #222;
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://unsplash.it/1200/800/?random');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        background-fill-mode: rgba(0,0,0,0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .container {
        background: white;
        padding: 20px 25px;
        border: 5px solid #26a69a;
        width: 550px;
        height: auto;
        box-sizing: border-box;
        position: relative;
    }
    .col.s6 > .btn {
        width: 100%;
    }
    .gender-male,.gender-female {
        display: inline-block;
    }
    .gender-female {
        margin-left: 35px;
    }
    radio:required {
        border-color: red;
    }
    .container {
        animation: showUp 0.5s cubic-bezier(0.18, 1.3, 1, 1) forwards;
    }

    @keyframes showUp {
        0% {
            transform: scale(0);
        }
        100% {
            transoform: scale(1);
        }
    }
    .row {margin-bottom: 10px;}

    .ngl {
        position: absolute;
        top: -20px;
        right: -20px;
    }

</style>
<div class="container">
    <div class="row">
        <form class="col s12" id="reg-form">
            <div class="row">
                <div class="input-field col s6">
                    <input id="first_name" type="text" class="validate" required>
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s6">
                    <input id="last_name" type="text" class="validate" required>
                    <label for="last_name">Last Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" class="validate" required>
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" type="password" class="validate" minlength="6" required>
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <div class="gender-male">
                        <input class="with-gap" name="gender" type="radio" id="male" required />
                        <label for="male">Male</label>
                    </div>
                    <div class="gender-female">
                        <input class="with-gap" name="gender" type="radio" id="female" required />
                        <label for="female">Female</label>
                    </div>
                </div>

                <div class="input-field col s6">
                    <button class="btn btn-large btn-register waves-effect waves-light" type="submit" name="action">Register
                        <i class="material-icons right">done</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <a title="Login" class="ngl btn-floating btn-large waves-effect waves-light red"><i class="material-icons">input</i></a>
</div>
<style>
    $(document).ready(function() {
        $('select').material_select();
    });
</style>