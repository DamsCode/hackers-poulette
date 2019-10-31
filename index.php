<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css" media="screen,projection"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
<div class="container center-align z-depth-3" id="block-form">
    <form method="POST">
        <div class="row">
            <div class="col s12">
                <img id="logo" src="assets/img/hackers-poulette-logo.png" alt="logo"/>
            </div>
            <div class="input-field col s6">
                <input id="first_name" type="text" class="validate"/>
                <label for="first_name">First Name</label>
            </div>
            <div class="input-field col s6">
                <input id="last_name" type="text" class="validate"/>
                <label for="last_name">Last Name</label>
            </div>
            <div class="input-field col s12">
                <div id="genre">
                    <div>
                        <label>Gender :</label>
                    </div>
                    <div>
                        <label>
                            <input class="with-gap" name="group1" type="radio"/>
                            <span>M</span>
                        </label>
                    </div>

                    <div>
                        <label>
                            <input class="with-gap" name="group1" type="radio"/>
                            <span>F</span>
                        </label>
                    </div>

                </div>
            </div>
            <div class="input-field col s12">
                <input id="email" type="email" class="validate"/>
                <label for="email">Email</label>
            </div>
            <div class="input-field col s12">
                <select>
                    <option value="" disa selected>Choose your country</option>
                    <option value="1">Belgium</option>
                    <option value="2">France</option>
                </select>
                <label>Country select</label>
            </div>
            <div class="input-field col s12">
                <select>
                    <option value="" disa selected>Choose your Subject</option>
                    <option value="1">Sav</option>
                    <option value="2">complain</option>
                    <option value="2">option3</option>
                    <option value="4">option4</option>
                </select>
                <label>Subject select</label>
            </div>
            <div class="input-field col s12">
                <textarea id="textarea" class="materialize-textarea"></textarea>
                <label for="textarea">Message</label>
            </div>
        </div>
        <div id="btn-submit">
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
</div>

<script type="text/javascript" src="assets/js/materialize.min.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>