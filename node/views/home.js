doctype html
html
  head
    title= title
    link(rel="stylesheet" href="/css/style.css")  // Link to external CSS file
    script(src="https://code.jquery.com/jquery-3.6.0.min.js")
    script(src="https://cdnjs.cloudflare.com/ajax/libs/responsiveslides/1.6.0/responsiveslides.min.js")
    script.
      $(function() {
        $(".rslides").responsiveSlides({
            auto: true,             // Boolean: Animate automatically, true or false
            speed: 500,            // Integer: Speed of the transition, in milliseconds
            timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
        });
      });
body
  .flexContent.notLoggedIn
    .leftContent
      h1 Welcome!
      p Streamline the process of report card making with our platform.
        | You can create these too:
      ul.rslides
        li
          img(src="Samples/1.JPG", alt="")
        li
          img(src="Samples/2.JPG", alt="")
        li
          img(src="Samples/3.JPG", alt="")
        li
          img(src="Samples/4.JPG", alt="")
    .rightContent
      .login
        .login-container
          .form-container
            form.login-form(action="/process_login", method="post")
              .form-border
                h1 Login
                .form-group
                  label(for="username") Username
                  input.form-control(type="text", name="username", id="username", autocomplete="yes")
                .form-group
                  label(for="password") Password
                  input.form-control(type="password", name="password", id="password")
                .button-group
                  button.btn(type="submit") Login
                p(style="text-align:center") Not Registered? 
                  a(href="sign_up") Sign Up
      .signUp
        // Add content for sign up section if needed
