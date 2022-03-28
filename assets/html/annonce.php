<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>DepiStage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/annonce2.css">


</head>

<body>
    <header class="p-3 bg-dark text-white">
    </header>
    <div>
        <div>
            <form action="http://localhost/assets/html/accueil.php">
                <button type="submit" class="btn btn-dark text-light me-2 m-2">Accueil</button>
            </form>



            <main>

                <article>
                    <form>


                        <div class="par1">

                            <img src="https://cdn.discordapp.com/attachments/950033739604434965/950403057567551528/logo.png"
                                width="120">

                            <!--<div class="h-100 p-5 row bg-light rounded-3">-->
                            <div class="h4 p-1 row bg-light rounded-3">
                                <h4 class="text-center p-1">Création d'une annonce</h4>

                            </div>

                            <fieldset>

                                <div class="row">

                                    <div class="container containerFiltre">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="firstName" class="form-label" _msthash="2295839"
                                                    _msttexthash="93574">Nom de
                                                    l'entreprise </label>
                                                <input type="text" class="form-control" id="Name" placeholder=""
                                                    value="" required="">
                                                <div class="invalid-feedback" _msthash="2152878" _msttexthash="637039"
                                                    _msthidden="1">
                                                    Valid name is required.
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <label for="Lien" class="form-label" _msthash="2296086"
                                                    _msttexthash="31395">Site de l'entreprise </label>
                                                <input type="text" class="form-control" id="Lien" placeholder=""
                                                    value="" required="">
                                                <div class="invalid-feedback" _msthash="2153099" _msttexthash="592748"
                                                    _msthidden="1">
                                                    Valid tag is required.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container containerFiltre">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="tag" class="form-label" _msthash="2297568"
                                                    _msttexthash="56784">Salaire</label>
                                                <select class="form-select" id="tag" required="">
                                                    <option value="" _msthash="244218" _msttexthash="101647">
                                                        Sélectionner...
                                                    </option>
                                                    <option _msthash="244400" _msttexthash="154310">600</option>
                                                    <option _msthash="244400" _msttexthash="154310">700</option>
                                                    <option _msthash="244400" _msttexthash="154310">800</option>
                                                    <option _msthash="244400" _msttexthash="154310">900</option>
                                                    <option _msthash="244400" _msttexthash="154310">1000</option>
                                                    <option _msthash="244400" _msttexthash="154310">1100</option>
                                                    <option _msthash="244400" _msttexthash="154310">1200</option>
                                                </select>
                                                <div class="invalid-feedback" _msthash="2154282" _msttexthash="631839"
                                                    _msthidden="1">
                                                    Please provide a valid year.
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <label for="Name" class="form-label" _msthash="2296086"
                                                    _msttexthash="31395">Référence</label>
                                                <input type="text" class="form-control" id="name" placeholder=""
                                                    value="" required="">
                                                <div class="invalid-feedback" _msthash="2153099" _msttexthash="592748"
                                                    _msthidden="1">
                                                    Valid tag is required.
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <label for="email" class="form-label" _msthash="2296580"
                                                    _msttexthash="420017">Email</label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="you@example.com" _mstplaceholder="274417">
                                                <div class="invalid-feedback" _msthash="2153541" _msttexthash="1993589"
                                                    _msthidden="1">
                                                    Please enter a valid email address for shipping updates.
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="container containerFiltre">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="tel" class="form-label" _msthash="2296580"
                                                    _msttexthash="420017">N° tel </label>
                                                <input type="text" class="form-control" id="tel"
                                                    placeholder="0695614597" _mstplaceholder="274417">
                                                <div class="invalid-feedback" _msthash="2153541" _msttexthash="1993589"
                                                    _msthidden="1">
                                                    Please enter a valid number for shipping updates.
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="ville" class="form-label" _msthash="2297074"
                                                    _msttexthash="407797">ville</label>
                                                <input type="text" class="form-control" id="address2"
                                                    placeholder="Saint-Nazaire" _mstplaceholder="395733">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="address" class="form-label" _msthash="2296827"
                                                    _msttexthash="94237">Adresse</label>
                                                <input type="text" class="form-control" id="address"
                                                    placeholder="60, rue Michel ange" required=""
                                                    _mstplaceholder="168753">
                                                <div class="invalid-feedback" _msthash="2153762" _msttexthash="926601"
                                                    _msthidden="1">
                                                    Please enter your shipping town.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container containerFiltre">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="year" class="form-label" _msthash="2297568"
                                                _msttexthash="56784">Année
                                                d'étude</label>
                                            <select class="form-select" id="year" required="">
                                                <option value="" _msthash="244218" _msttexthash="101647">Sélectionner...
                                                </option>
                                                <option _msthash="244400" _msttexthash="154310">BAC +1</option>
                                                <option _msthash="244400" _msttexthash="154310">BAC +2</option>
                                                <option _msthash="244400" _msttexthash="154310">BAC +3</option>
                                                <option _msthash="244400" _msttexthash="154310">BAC +4</option>
                                                <option _msthash="244400" _msttexthash="154310">BAC +5</option>
                                            </select>
                                            <div class="invalid-feedback" _msthash="2154282" _msttexthash="631839"
                                                _msthidden="1">
                                                Please provide a valid year.
                                            </div>
                                        </div>


                                        <div class="col-sm-3">
                                            <label for="firstName" class="form-label" _msthash="2295839"
                                                _msttexthash="93574">Date
                                                de début : </label>
                                            <input class="form-select LastInput" type="date">

                                        </div>

                                        <div class="col-sm-3">

                                            <label for="dated" class="form-label" _msthash="2295839"
                                                _msttexthash="93574">Date
                                                de
                                                fin : </label>
                                            <input class="form-select LastInput" type="date">
                                        </div>
                                    </div>
                                </div>


                                <br><br>

                                <div class="row ">
                                    <div class="col-lg-9">
                                        <form>
                                            <div class="form-group">

                                                <div class="card border-bottom-0" style="margin-bottom: 0 !important;">
                                                    <p class="card-header" style="font-size: 1.25rem;"> Description
                                                    </p>




                                                </div><textarea class="form-control" id="wordCounterTextArea" rows="3"
                                                    placeholder="Paste text here or start typing"></textarea><label
                                                    for="wordCounterTextArea" style="margin-left: 5px;"><i><small>Entrer
                                                            votre
                                                            texte ci-dessus</small></i></label>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                                <!--textarea name="paragraph_text" cols="50" rows="10"
                            placeholder="Description 10 000 mots (max)"></textarea> -->


                                <button type="submit" class="btn btn-primary btn-lg" id="Submit">Soumettre</button>
                                &emsp;&emsp;


                                <button type="reset" class="btn btn-secondary btn-lg" id="reset">Réinitialiser</button>



                            </fieldset>
                        </div>
                        <p class="mt-5 mb-3 text-muted">© 2021 DepiStage, Inc. All rights reserved.</p>
                    </form>
                </article>
            </main>
</body>

</html>


