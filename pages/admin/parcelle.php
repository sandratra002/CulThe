<div class="body double-col">
        <section class="left">
            <h1 class="section__title">Tableau des parcelles</h1>

            <hr class="section__sep">

            <div class="section__content">
                <table>
                    <tr>
                        <th class="id number">ID Parcelle</th>
                        <th class="surface">Surface en Ha</th>
                        <th class="name">Type de plantation</th>
                    </tr>

                    <tr>
                        <td class="id number">1</td>
                        <td class="occupation">12</td>
                        <td class="name">Black tea</td>
                    </tr>
                    <tr>
                        <td class="id number">1</td>
                        <td class="occupation">12</td>
                        <td class="name">Black tea</td>
                    </tr>
                    <tr>
                        <td class="id number">1</td>
                        <td class="occupation">12</td>
                        <td class="name">Black tea</td>
                    </tr>
                    <tr>
                        <td class="id number">1</td>
                        <td class="occupation">12</td>
                        <td class="name">Black tea</td>
                    </tr>
                    <tr>
                        <td class="id number">1</td>
                        <td class="occupation">12</td>
                        <td class="name">Black tea</td>
                    </tr>
                    <tr>
                        <td class="id number">1</td>
                        <td class="occupation">12</td>
                        <td class="name">Black tea</td>
                    </tr>
                    <tr>
                        <td class="id number">1</td>
                        <td class="occupation">12</td>
                        <td class="name">Black tea</td>
                    </tr>
                </table>
            </div>
        </section>

        <section class="right">
            <form action="" method="post" id="login-form" class="form">
                <h1 class="form__title">Gestion des parcelles</h1>

                <hr class="form__sep">

                <div class="form__content">
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
                        <label for="tea" class="form__label">Variete de The:</label>

                        <select name="tea_id" id="tea" class="form__input-field">
                            <option value="0">The 1</option>
                            <option value="1">The 2</option>
                            <option value="2">The 3</option>
                        </select>
                    </div>

                    <div class="form__input vertical">
                        <label for="occupation" class="form__label">Surface:</label>

                        <div>
                            <input type="number" name="occupation" id="occupation" class="form__input-field" />
                            <span class="form__input-field unit">Ha</span>
                        </div>
                    </div>
                </div>

                <input type="submit" value="Inserer" class="form__submit btn" />
            </form>
        </section>
    </div>