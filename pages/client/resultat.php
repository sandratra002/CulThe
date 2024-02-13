<div class="body double-col">
        <section class="left">
            <h1 class="section__title">Historique des resultats</h1>

            <hr class="section__sep">

            <div class="section__content">
                <table id="table">
                    <tr>
                        <th class="id number">Poids total cueillette</th>
                        <th class="date">Variete</th>
                        <th class="id number">Poids restant sur le parcelles</th>
                        <th class="date">Cout de revient</th>
                    </tr>

                    <tr>
                        <td class="id number">100</td>
                        <td class="name">THe de Sandratra</td>
                        <td class="id number">50kg</td>
                        <td class="id number">30000</td>
                    </tr>

                </table>
            </div>
        </section>

        <section class="right">
            <form action="" method="post" id="login-form" class="form">
                <h1 class="form__title">Check Historique</h1>

                <hr class="form__sep">

                <div class="form__content">
                    <div class="form__input horizontal">
                        <div class="form__input vertical">
                            <label for="date_harvest" class="form__label">Date debut:</label>

                            <input type="date" name="date_debut" id="date_harvest" class="form__input-field" />
                        </div>
                        <div class="form__input vertical">
                            <label for="date_harvest" class="form__label">Date fin:</label>

                            <input type="date" name="date_fon" id="date_harvest" class="form__input-field" />
                        </div>
                    </div>
                </div>

                <input type="submit" value="Check" class="form__submit btn" id="form__submit-btn" />
            </form>
        </section>
    </div>