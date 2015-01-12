<section class="entry">
    <div class="entry-selector">
        <span class="entry-login">Log In</span>
        |
        <span class="entry-signup">Sign Up</span>
    </div>
    <form class="entry-login">
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
    <form class="entry-signup">
        <dl>
            <dt class="form-label signup-label signup-label-username">
                <label for="signup-username">Username</label>
            </dt>
            <dd class="form-field signup-field signup-field-username">
                <input type="text" id="signup-username" name="username" value="<%- username %>" />
            </dd>
            <dd class="form-error signup-error signup-error-username">
            </dd>
            <dt class="form-label signup-label signup-label-email">
                <label for="signup-email">Email</label>
            </dt>
            <dd class="form-field signup-field signup-field-email">
                <input type="text" id="signup-email" name="email" value="<%- email %>" />
            </dd>
            <dd class="form-error signup-error signup-error-email">
            </dd>
            <dt class="form-label signup-label signup-label-password">
                <label for="signup-password">Password</label>
            </dt>
            <dd class="form-field signup-field signup-field-password">
                <input type="text" id="signup-password" name="password" value="<%- password %>" />
            </dd>
            <dd class="form-error signup-error signup-error-password">
            </dd>
            <dt class="form-label signup-label signup-label-password2">
                <label for="signup-password2">Password2</label>
            </dt>
            <dd class="form-field signup-field signup-field-password2">
                <input type="text" id="signup-password2" name="password2" value="<%- password2 %>" />
            </dd>
            <dd class="form-error signup-error signup-error-password2">
            </dd>
        </dl>
        <input type="submit" class="form-submit signup-submit" name="submit" value="Sign Up" />
    </form>
</section>