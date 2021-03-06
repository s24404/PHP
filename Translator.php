
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
    <link rel="stylesheet"
          href=
          "https://unpkg.com/purecss@1.0.0/build/pure-min.css"
          integrity=
          "sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w"
          crossorigin="anonymous" />

    <style>

        body {


            background: linear-gradient(-45deg, #bc5090, #ff6361,#003f5c, #b06ab3);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            height: 100vh;

            font-family: 'Courier New', monospace;
            font-size: 112.5%;
            text-align: center;
            font-weight: 700;


        }


        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }

        }
        /*
        Buttons
         */

        .button1 {

            font-family: 'Courier New', monospace;
            font-weight: bold;
            font-size: 1em;
            letter-spacing: 0.1em;
            text-decoration: none;
            background-color: #393e46;
            color: white;
            display: inline-block;
            padding: 10px 40px 10px 40px;
            position: relative;
            border: 3px solid #ffffff;
            border-radius: 25px;

        }

        .button2 {
            font-family: 'Courier New', monospace;
            font-weight: bold;
            font-size: 1em;
            letter-spacing: 0.1em;
            text-decoration: none;
            background-color: #393e46;
            color: white;
            display: inline-block;
            padding: 10px 40px 10px 40px;
            position: relative;
            border: 3px solid #ffffff;
            border-radius: 25px;

        }

        .button3 {
            font-family: 'Courier New', monospace;
            font-weight: bold;
            font-size: 1em;
            letter-spacing: 0.1em;
            text-decoration: none;
            background-color: #393e46;
            color: white;
            display: inline-block;
            padding: 10px 40px 10px 40px;
            position: relative;
            border: 3px solid #ffffff;
            border-radius: 25px;
        }


        .button_sub {
            border: 5em;
            cursor: pointer;
            outline: none;
            font-size: 16px;
            -webkit-transform: translate(0);
            transform: translate(0);
            background-image: linear-gradient(45deg, #4568dc, #b06ab3);
            padding: 0.7em 2em;
            border-radius: 65px;
            box-shadow: 1px 1px 10px rgba(255, 255, 255, 0.438);
            -webkit-transition: box-shadow 0.25s;
            transition: box-shadow 0.25s;
            color: white;

        }

        }
        .button_sub:after {
            content: "";
            border-radius: 18px;
            position: absolute;
            margin: 4px;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            z-index: -1;
            background: #0e0e10;
        }

        .button_sub:hover {
            background-image: linear-gradient(-45deg, #4568dc, #b06ab3);
            box-shadow: 0 12px 24px rgba(128, 128, 128, 0.1);
        }



        /*  button download*/

        .button_save {

            position: fixed;
            top: 615px;
            right: 260px;

        }

        .button_up {

            position: fixed;
            left: 260px;
            color: white;

        }






        /*
        text areas
         */
        .area1 {
            outline: none;

            font-family: lato,sans-serif;
            font-weight: bold;
            font-size: 1em;
            letter-spacing: 0.1em;
            text-decoration: none;
            background-color: #393e46;
            color: white;
            padding: 60px 80px 60px 80px;
            position: relative;
            border: 3px solid #ffffff;
            border-radius: 25px;
            resize: none;
        }
        .area2 {
            outline: none;

            font-family: lato,sans-serif;
            font-weight: bold;
            font-size: 1em;
            letter-spacing: 0.1em;
            text-decoration: none;
            background-color: #393e46;
            color: white;
            padding: 60px 80px 60px 80px;
            position: relative;
            border: 3px solid #ffffff;
            border-radius: 25px;
            resize: none;
        }
        .label1 {
            margin-right: 1050px;
            color: white;

        }

        .h1 {
            color: white;
        }
    </style>
</head>




<body>

<h1 class="h1">CIPHER ENCODER / DECODER</h1><br><br>

<div>
    <form method="post" action="">

        <input class="button1" type ="button" value="Morse code" onclick="">&nbsp&nbsp
        <input class="button2" type ="button" value="Caesar cipher" onclick="">&nbsp&nbsp
        <input class="button3" type ="button" value="Affine cipher" onclick=""><br><br><br><br>

        <label class="label1" for="text1">Enter text you want to encode: </label><br><br>

        <textarea class="area1" name="text1" id="text1" rows="10" cols="50"></textarea>&nbsp &nbsp &nbsp
        <textarea  class="area2" name="text2" id="text2" rows="10" cols="50" ></textarea><br>


        <input class="button_up" type="file" name="inputfile"
               id="inputfile">
        <br>



        <script type="text/javascript">
            document.getElementById('inputfile')
                .addEventListener('change', function() {

                    var fr = new FileReader();
                    fr.onload=function(){
                         document.getElementById('text1')
                            .textContent=fr.result;
                    }

                    fr.readAsText(this.files[0]);
                })
        </script>&nbsp &nbsp

        <button class="button_save" onclick=saveTextAsFile(text2.value,'download.txt')>Download</button><br><br>

        <input class="button_sub" type="submit" value="Submit">





    </form>

</div>
</div>

</body>
</html>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $word = $_POST['text1'];
    $word2 = $_POST['text2'];

    if($word == "" && $word2 == "") {
        echo '<script>alert("The input must not be empty!")</script>';
    }




    function get_morse() {

    return array(
            "\n" => "\n",
            " " => "     ",
        "a" => "*- ",
        "b" => "-*** ",
        "c" => "-*-* ",
        "d" => "-** ",
        "e" => "* ",
        "f" => "**-* ",
        "g" => "--* ",
        "h" => "**** ",
        "i" => "** ",
        "j" => "*--- ",
        "k" => "-*- ",
        "l" => "*-** ",
        "m" => "-- ",
        "n" => "-* ",
        "o" => "--- ",
        "p" => "*--* ",
        "q" => "--*- ",
        "r" => "*-* ",
        "s" => "*** ",
        "t" => "- ",
        "u" => "**- ",
        "v" => "***- ",
        "w" => "*-- ",
        "x" => "-**- ",
        "y" => "-*-- ",
        "z" => "--** ",
        "A" => "|*- ",
        "B" => "|-*** ",
        "C" => "|-*-* ",
        "D" => "|-** ",
        "E" => "|* ",
        "F" => "|**-* ",
        "G" => "|--* ",
        "H" => "|**** ",
        "I" => "|** ",
        "J" => "|*--- ",
        "K" => "|-*- ",
        "L" => "|*-** ",
        "M" => "|-- ",
        "N" => "|-* ",
        "O" => "|--- ",
        "P" => "|*--* ",
        "Q" => "|--*- ",
        "R" => "|*-* ",
        "S" => "|*** ",
        "T" => "|- ",
        "U" => "|**- ",
        "V" => "|***- ",
        "W" => "|*-- ",
        "X" => "|-**- ",
        "Y" => "|-*-- ",
        "Z" => "|--** ");
}

function morse_encoder($word) {
    return str_replace(array_keys(get_morse()), get_morse(), $word);
}

function morse_decoder($word) {
    $morse = array_map("trim", get_morse());
    $output = "";
    foreach (explode(" ", $word) as $value) {
        $output .= array_search($value, $morse);
    }
    return $output;
}

}
?>




<html>
<script>
    document.getElementById('text1').value ="<?php echo $word;?>";
    document.getElementById('text2').value ="<?php echo morse_decoder($word) ."". morse_encoder($word)?>";


</script>

</html>
<script>
    function saveTextAsFile(textToWrite, fileNameToSaveAs)
    {
        var textFileAsBlob = new Blob([textToWrite], {type:'text/plain'});
        var downloadLink = document.createElement("a");
        downloadLink.download = fileNameToSaveAs;
        downloadLink.innerHTML = "Download File";
        if (window.webkitURL != null)
        {
            //chrome
            downloadLink.href = window.webkitURL.createObjectURL(textFileAsBlob);
        } else
        {
            // Firefox
            downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
            downloadLink.onclick = destroyClickedElement;
            downloadLink.style.display = "none";
            document.body.appendChild(downloadLink);
        } downloadLink.click();
    }
</script>
