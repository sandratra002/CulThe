<div class="body double-col">
        <section class="left">
            <h1 class="section__title">Historique des resultats</h1>

            <hr class="section__sep">

            <div class="section__content">
                <table>
                    <tr>
                        <th class="id number">Poids total cueillette</th>
                        <th class="id number">Poids restant sur le parcelles</th>
                        <th class="date">Cout de revient</th>
                    </tr>

                    <tr>
                        <td class="id number">100</td>
                        <td class="id number"></td>
                        <td class="name">21/03/2024</td>
                    </tr>

                </table>
            </div>
        </section>

        <section class="right">
            <form action="" method="post" id="login-form" class="form">
                <h1 class="form__title">Check Historique</h1>

                <hr class="form__sep">

                <div class="form__content">
                    <div class="form__input vertical">
                        <label for="date_harvest" class="form__label">Date de ceuillette:</label>

                        <input type="date" name="date_harvest" id="date_harvest" class="form__input-field" />
                    </div>

                    <div class="form__input vertical">
                        <label for="field" class="form__label">Identification parcelle:</label>

                        <select name="field_id" id="field" class="form__input-field">
                            <option value="">-</option>
                            <option value="0">Parcelle 1</option>
                            <option value="1">Parcelle 2</option>
                            <option value="2">Parcelle 3</option>
                        </select>
                    </div>

                    <div class="form__input vertical">
                        <label for="weight_harvest" class="form__label">Poids cueilli:</label>

                        <div>
                            <input type="number" name="weight_harvest" id="weight_harvest" class="form__input-field" />
                            <span class="form__input-field unit">Kg</span>
                        </div>
                    </div>
                </div>

                <input type="submit" value="Inserer" class="form__submit btn" />
            </form>
        </section>
    </div>