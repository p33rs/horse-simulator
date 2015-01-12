<form class="horse_create">
    <dl>
        <dt class="form-label login-label login-label-username">
            <label for="login-username">Username</label>
        </dt>
        <dd class="form-field login-field login-field-username">
            <input type="text" id="login-username" name="username" value="<%- username %>" />
        </dd>
        <dd class="form-error login-error login-error-username">
        </dd>
        <dt class="form-label login-label login-label-password">
            <label for="login-password">Password</label>
        </dt>
        <dd class="form-field login-field login-field-password">
            <input type="text" id="login-password" name="password" value="<%- password %>" />
        </dd>
        <dd class="form-error login-error login-error-password">
    </dl>
    <input type="submit" class="form-submit login-submit" name="submit" value="Log In" />
</form>