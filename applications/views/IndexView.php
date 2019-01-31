
    <div>
        <p>Заполните поля, чтобы залогиниться</p>
        <form method="post" action="../index/index">
            <table>
                <tr>
                    <td><label for="loginField">Логин</label></td>
                    <td><input id="loginField" type="text" name="login"></td>
                </tr>
                <tr>
                    <td><label for="passwordField">Пароль</label></td>
                    <td><input id="passwordField" type="text" name="password"></td>
                </tr>
                <tr>
                    <td> <button type="submit">login</button></td>
                    <td><input type="checkbox" name="rememberme">Запомнить</td>
                    <td align="right">  <button type="submit" name = "logout">logout</button></td>
                </tr>
            </table>
            <div><p><a href="../register/register">Войдите, если не зарегестрированы</a></p>
        </form>
    </div>
