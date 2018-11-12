<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple To-Do List</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/main.css')}}" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <style type="text/css">
	    body {
	        color: #666;
	        background: #f5f5f5;
	        font-family: 'Varela Round', sans-serif;
	        font-size: 12px;
	    }

	    h1 {
	        margin: 0;
	    }

	    .app--header {
	        margin-top: 40px;
	    }

	    .app--header .btn {
	        margin: 20px 0;
	    }

	    button.close {
	        margin: -10px;
	    }
	    button.close a {
	    	text-decoration: none !important;
	    	color: inherit;
	    }

	    .doneTask {
	    	float: right;
	    }

	    .doneTask:hover {
	    	text-decoration: underline;
	    }

	    .card-body.is-done .blockquote {
			text-decoration: line-through;
			opacity: 0.4;
        }
        
        #return-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: rgb(0, 0, 0);
            background: rgba(0, 0, 0, 0.7);
            width: 50px;
            height: 50px;
            display: block;
            text-decoration: none;
            -webkit-border-radius: 35px;
            -moz-border-radius: 35px;
            border-radius: 35px;
            display: none;
            -webkit-transition: all 0.3s linear;
            -moz-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }
        #return-to-top i {
            color: #fff;
            margin: 0;
            position: relative;
            left: 16px;
            top: 13px;
            font-size: 19px;
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }
        #return-to-top:hover {
            background: rgba(0, 0, 0, 0.9);
        }
        #return-to-top:hover i {
            color: #fff;
            top: 5px;
        }

	    </style>
</head>





<body>

    @yield('navigation')

    <div class="container">
        <div class="row app--header">
            <div class="col-12 col-sm-9 col-md-5 col text-md-center">

            </div>
            <div class="col-12">
                <h1>Simple To-Do list</h1>
                <div class="button-group">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNote">Add New</button>
                    <button type="button" class="btn btn-danger"  data-remove-all >Remove All</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card-columns">

                    @foreach ($todos as $single_todo)
                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="close">
                                    <a href="/todo/delete/{{$single_todo->id}}"><span>&times;</span></a>
                                </button>
                                <blockquote class="blockquote">
                                    <p>
                                        {{ $single_todo->title }}
                                    </p>
                                </blockquote>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>

</body>

<!-- Modal -->
<div class="modal fade" id="addNote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new Note</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method = "post" action="/todo/addnew">
                @csrf

                <div class="modal-body">
                    <textarea name="note" class="form-control" id="noteTextArea" rows="10"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Add Note</button>
                </div>
            </form>
        </div>
    </div>
</div>








<script>

// ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});












/**
 * Funkcija kas pieliks jaunu tāsku mūsu tasku listē
 *
 * @param {string} text `Teksts kas parādīsies tāskā`
 */
function addNewTask(text) {
    // Izveidojam <div class="card"></div>
    var card = $('<div>').addClass('card');

    // Izveidojam <div class="card-body"></div>
    var cardBody = $('<div>').addClass('card-body');

    // Izveidojam <button type="button" class="close"> <span>&times;</span></button>
    var button = $('<button>').addClass('close').attr('type', 'button').html('<span>&times;</span>')

    // Izveidojam <blockquote class="blockquote"> <p></p> </blockquote>
    var blockquote = $('<blockquote>').addClass('blockquote').append($('<p>'));

    // Katrs elements tagad ir savā mainīgajā...
    // sametam viņus visus kopā.
    cardBody.append(button);
    cardBody.append(blockquote);
    card.append(cardBody);

    // Iemetam tajā <p> tekstu
    blockquote.find('p').text(text);

    // Un tagad visu to baru ieliekam iekš <div class="card-columns">
    $('.card-columns').append(card);
};


// Īstās lietas sākam darīt tikai tad kad browseris saka ka viņs ir gatavs.
// Tehniski aprakstot - šī funkcija izsauksies tad, kad notiks $(document).ready() events.
$(function(){

    // Piereģistrējam `click` eventu visiem `.close` elementiem
    // kas atrodas iekš `.card-columns`
    $('.card-columns').on('click', '.close', function(event) {
        $(this).parents('.card').remove();
    })

    // Uztaisam tā, ka nospiežot modālā loga footerī esošo
    // pogu ar klasi `.btn` pieliekas jauns tasks
    // $('#addNote .modal-footer .btn').click(function(event) {
    //     // Paņemam no `<textarea>` ierakstīto tekstu
    //     // un saglabajam mainīgajā lai nepazūd
    //     var text = $('#addNote textarea').val();

    //     // Izdzēšam ierakstīto tekstu...
    //     // tehniski pareizāk būtu teikt aizstājam
    //     // tekstu ar tukšu burtu virkni...
    //     $('#addNote textarea').val('');

    //     // Uztaisam pārbaudi vai mēs vispār kko esam
    //     // ierakstijuši
    //     if (text != '') {
    //         addNewTask(text);
    //     } else {

    //         // ja funkcija kas izsaucas jQuery eventa laikā
    //         // atgriež `false`, tad jQuerijs pasaka browserim
    //         // ka šis events ir jāaizmirst..
    //         //
    //         // Visos pārējos gadījumos browseris turpinās izpildīt
    //         // visas tās funkcijas kas piesaistītas pie šī eventa.
    //         //
    //         // Konkrētā gadījumā mēs to daram, lai neaizvērtos modal logs.
    //         return false;
    //     }

    // })


    // Atrodam pogu kura izdzēsīs visus mūsu taskus.
    // un piesaistam tai click eventu
    $('[data-remove-all]').click(function(event) {
        // Atrodam visas kartiņas.
        var notes = $('.card');

        // Izejam cauri visām kartiņām un katrai izsaucam
        // remove() funkciju.
        var i = 0;
        for (i; i < notes.length; i++) {
            notes[i].remove();
        }
    })

});

</script>

</html>