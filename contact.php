<!doctype html>
<meta name="robots" content="noindex">
<html>

<head>
    <meta charset="utf-8">
    <title>Nick Hulea</title>
    <meta name="description" content="fuck nhm !">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="https://use.typekit.net/yer1yzk.js"></script>
    <script>
        try {
            Typekit.load({
                async: true
            });
        } catch (e) {}
    </script>
</head>

<body class="hide-overlay">
    <nav>
        <ul>
            <li class="list one"></li>
            <!-- <li class="list two"></li>
            <li class="list three"></li>
            <li class="list four"></li>
            <li class="list five"></li>
            <li class="list six"></li> -->
        </ul>
        <ul style="display:none;">
            <li class="list lines">
                <span contenteditable="false" class="l1"></span>
                <span contenteditable="false" class="l2"></span>
                <span contenteditable="false" class="l3"></span>
            </li>
            <!-- <li class="list two"></li>
            <li class="list three"></li>
            <li class="list four"></li>
            <li class="list five"></li>
            <li class="list six"></li> -->
        </ul>
    </nav>
    <div class="overlay">
        <div class="overlay-content">
            <!-- <div id="title">
    <h1>Title</h1>
   </div> -->
            <div id="close"><span>close</span>
            </div>
            <ul id="weblist">
            </ul>
        </div>
    </div>
    <div class="background-content">
        <section class="offset60">
            <h1 contenteditable="false" id="title">Contact</h1>
        </section>
        <section class="offset0">
            <!-- <div id="image" class="imgHero" style="background-image: url()"></div> -->
        </section>
        <section class="offset60">
            <h3></h3>
            <p id="description" contenteditable="false"></p>
            <form id="form-contact" name="form-contact" method="post">
                <fieldset id="person_data">
                    <label for="email">Email:
                            <input type="email" class="required mail" value="" id="email" name="email" placeholder="Email" required="">
                        </label>
                    <label for="first_name">First Name:
                            <input type="text" class="required" value="" id="first_name" name="first_name" placeholder="First Name" required="">
                        </label>
                    <label for="last_name">Last Name:
                            <input type="text" class="required" value="" id="last_name" name="last_name" placeholder="Last Name" required="">
                        </label>
                    <label for="message">Would you like to receive emails:
                            <textarea placeholder="Your Message" class="edit required" name="message" id="message" cols="17" rows="2"></textarea>
                        </label>
                </fieldset>
                <button type="button" class="button">Submit</button>
            </form>
        </section>
        <!-- <section class="offset40">
            <a id="next" class="next"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        </section> -->
        <div id="wrap">
            <div id="block"></div>
        </div>

    </div> 
    <div id="root"></div>
    <div id="load">
        <div><b>Loading ...</b></div>
    </div>
    <script src="https://unpkg.com/react@15/dist/react.js"></script>
    <script src="https://unpkg.com/react-dom@15/dist/react-dom.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript">

        function formatName(user) {
          return user.firstName + ' ' + user.lastName;
        }

        const user = {
          firstName: 'Harper',
          lastName: 'Perez'
        };

        const element = (
          <h1>
            Hello, {formatName(user)}!
          </h1>
        );

    </script>
</body>

</html>