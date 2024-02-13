<div class="body double-col">
        <section class="left">
            <h1 class="section__title">Historique des resultats</h1>

            <hr class="section__sep">

            <div class="section__content">
                <table id="table">
                    <tr>
                        <th class="id number">Date</th>
                        <th class="date">Nom</th>
                        <th class="id number">Poids</th>
                        <th class="date">Bonus</th>
                        <th class="date">Mallus</th>
                        <th class="date">Montant Payement</th>
                    </tr>

                    <tr>
                        <td class="id number">2023-12-02</td>
                        <td class="name">Sandratra</td>
                        <td class="id number">50kg</td>
                        <td class="id number">2%</td>
                        <td class="id number">4%</td>
                        <td class="id number">100000</td>
                    </tr>

                </table>
            </div>
        </section>

        <section class="right">
            <form action="" method="post" id="login-form" class="form">
                <h1 class="form__title">Check Payement Cuielleurs</h1>

                <hr class="form__sep">

                <div class="form__content" >
                    <div class="form__input horizontal" style="display: flex;">
                        <div class="form__input vertical">
                            <label for="date_debut" class="form__label">Date debut:</label>

                            <input type="date" name="date_debut" id="date_debut" class="form__input-field" />
                        </div>
                        <div class="form__input vertical">
                            <label for="date_fin" class="form__label">Date fin:</label>

                            <input type="date" name="date_fin" id="date_fin" class="form__input-field" />
                        </div>
                    </div>
                </div>

                <input type="submit" value="Check" class="form__submit btn" id="form__submit-btn" />
            </form>
        </section>
    </div>