<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UEKat Project</title>
    <link rel="stylesheet" href="css/style.css"/> 
</head>
<body>
    <div class="app">
        <header class="app__header">
            <div class="header">
                <div class="header__container">
                    <img src="images/logo.jpg" alt="UEKat" class="header__logo">
                </div>
            </div>
        </header>
        <main class="app__view">
            <div class="view">
                <h2 class="view__headline">Lista wykładowców</h2>
                <div class="view__list">
                    <div class="list" id="list">
                        <table class="list__table list-table">
                            <tbody class="list-table__body">
                                <tr class="list-table__tr">
                                    <th class="list-table__th">ID</th>
                                    <th class="list-table__th">Stopień</th>
                                    <th class="list-table__th">Imię i nazwisko</th>
                                    <th class="list-table__th">Prowadzone przedmioty</th>
                                    <th class="list-table__th">Akcja</th>
                                </tr>
                                <?php foreach ($lecturers as $lecturer): ?>
                                <tr class="list-table__tr">
                                    <td class="list-table__td" style="text-align:center"><?php echo $lecturer['id']; ?></td>
                                    <td class="list-table__td"><?php echo $lecturer['title']; ?></td>
                                    <td class="list-table__td"><?php echo $lecturer['name']; ?></td>
                                    <td class="list-table__td">
                                        <div class="subjects-list">
                                            <?php foreach ($lecturer['subjects'] as $subject): ?>
                                            <div class="subjects-list__badge">
                                                <?php echo $subject['code']; ?>
                                            </div>
                                            <?php endforeach; ?>        
                                        </div>
                                    </td>
                                    <td class="list-table__td" style="text-align:center">
                                        <a href="/delete-lecturer?id=<?php echo $lecturer['id']; ?>" class="link">
                                            Usuń
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h2 class="view__headline">Dodaj wykładowcę</h2>
                <form class="view__form form" action="/add-lecturer" method="post">
                    <fieldset class="form__set">
                        <label for="title" class="form__label">Stopień</label>
                        <select name="title" id="title">
                            <option value="mgr">mgr</option>
                            <option value="mgr inż.">mgr inż.</option>
                            <option value="dr">dr</option>
                            <option value="dr inż.">dr inż.</option>
                            <option value="dr hab.">dr hab.</option>
                            <option value="dr hab. inż.">dr hab. inż.</option>
                            <option value="prof. UE dr hab.">prof. UE dr hab.</option>
                            <option value="prof. UE dr hab. inż.">prof. UE dr hab. inż.</option>
                            <option value="prof.">prof.</option>
                        </select>
                    </fieldset>
                    <fieldset class="form__set">
                        <label for="name" class="form__label">Imię i nazwisko</label>
                        <input name="name" class="form__input">
                    </fieldset>
                    <fieldset class="form__set">
                        <label for="subjects" class="form__label">Prowadzone przedmioty</label>
                        <div class="form__checkboxes">
                            <?php foreach ($subjects as $subject): ?>
                            <div class="form__checkbox"> 
                                <div class="checkbox">
                                    <input id="subject-<?php echo $subject['id']; ?>" name="subjects[<?php echo $subject['id']; ?>]" type="checkbox" class="checkbox__input">
                                    <label for="subject-<?php echo $subject['id']; ?>" class="checkbox__label" title="<?php echo $subject['name']; ?>">
                                        <?php echo $subject['code']; ?>
                                    </label>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </fieldset>
                    <div class="form__submit">
                        <button class="btn" type="submit">Zapisz wykładowcę</button>
                    </div>
                </form>
            </div>
        </main>
        <footer class="app__footer">
            <div class="footer">&copy; 2021 Szymon Nowak</div>
        </footer>
    </div>
</body>
</html>