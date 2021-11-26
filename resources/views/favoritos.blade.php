@extends('layouts.app-perfil-layout')

@section('title', 'Home')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div id="modal-book" class="modal-book">
        <i class="far fa-times-circle" id="button-close-modal-book"></i>
        <h2 class="modal-title-book"></h2>
        <hr>
        <div class="infos-modal">
            <div class="book-info">
            </div>
            <div class="generate-abnt">
                <div>
                    <h2>Gerador de ABNT</h2>
                    <div class="group-abnt">
                        <textarea disabled id="input-abnt" class="input-abnt"></textarea>
                        <button
                            id="btn-abnt-copy"><i class="far fa-copy" id="i-abnt-copy"></i>
                        </button>
                    </div>
                </div>
                <div class="right-side">
                </div>
            </div>
        </div>

    </div>

    <div class="fav mt-5 px-5">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card mt-5 mb-5">
                    <div class="card-body">
                        <h2 class="card-title text-center mt-4">Seus Livros Favoritos</h2>
                        <div id="status" class="mb-5 mt-5">

                        </div>
                        <div id="fav-books" class="mb-5 show-books">

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="{{ asset('css/main-library.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fav.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/favoritos.js') }}"></script>
    <script src="{{ asset('js/api.js') }}"></script>
    <script src="{{ asset('js/livros.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        var $jq = jQuery.noConflict();

        $jq(document).ready(function() {
            setStatus('loading')
            $jq('#fav-books').addClass('d-none')
            let savedBooks = {!! json_encode($savedBooks, JSON_HEX_TAG) !!};
            let i = 1;
            if (savedBooks.length == 0) {
                setStatus('nothingData')
            }
            savedBooks.forEach(book => {
                api_unesp.get(
                        `https://api-na.hosted.exlibrisgroup.com/primo/v1/search?vid=55UNESP_INST:UNESP&scope=BBA&tab=LIBS&q=isbn,contains,${book.identification}`
                    )
                    .then(data => {
                        let json = data.docs[0];
                        json.cnpjLib = '48.031.918/0004-77'
                        let cnpj = json.cnpjLib;
                        let title = json.pnx.sort.title[0].split('/')[0].replace(/\s+$/, '');
                        let info = []
                        let creators = []
                        let publisher = json.pnx.display.publisher[0] ? json.pnx.display
                            .publisher[0] : null;
                        let local
                        if (publisher) {
                            let result = publisher.split(':')
                            local = result[0]
                            publisher = result.length > 1 ? result[1] : null
                        }
                        let creationDate = json.pnx.sort.creationdate[0] ? json.pnx.sort
                            .creationdate[0] : null;
                        let locations = "";
                        let author = json.pnx.sort.author ? json.pnx.sort.author[0] :
                            null;
                        let isbn = json.pnx.addata.isbn ? json.pnx.addata.isbn : null;

                        let formatedIsbn = ""
                        if (isbn) {
                            isbn.forEach(function(i) {
                                if (i)
                                    formatedIsbn += i + "<br>"
                            })
                        } else {
                            formatedIsbn = 'Este livro não possui nenhum ISBN registrado!'
                        }


                        json.delivery.holding.forEach((location, index) => {
                            locations += `${location.mainLocation}`;
                            locations += (index + 1) < json.delivery.holding.length ?
                                ',<br>' : ''
                            //,<br>
                        })

                        if (json.pnx.sort.author) {
                            json.pnx.sort.author.forEach(author => {
                                info += author.replace('$$Q', ';').split(';', 1)
                            })
                        }
                        if (json.pnx.display.contributor) {
                            json.pnx.display.contributor.forEach(contributor => {
                                info += ";" + (contributor.replace('$$Q', ';').split(';', 1))
                            })
                        }

                        let savedBook = false
                        if (isbn) {
                            hasBook({
                                isbn: isbn[0]
                            }).then(savedBook => {
                                getLibByCnpj({
                                    cnpj: cnpj
                                }).then(data => {
                                    console.log(savedBook)
                                    let lib = data.lib
                                    let divBook = document.createElement('div')
                                    divBook.className = 'book'
                                    divBook.innerHTML = `
                                        <img src="${document.location.origin}/img/open-book.png" class="mr-3 ml-3 p-4">
                                        <div class="infos">
                                            <div class="d-flex align-items-center">
                                                <h4 class="mr-2">${title}</h4>
                                                <i class="fa${savedBook.book ? 's' : 'r'} fa-bookmark mr-3 ml-auto h4" ></i>
                                            </div>
                                            <p class="info">${info}</p>
                                            <p>${json.pnx.display.creationdate[0]}</p>
                                            Está em:
                                            <div><b>${locations}<b><div> 
                                        </div>
                                    `
                                    $jq('#fav-books').append(divBook)
                                    if (savedBooks.length == i) {
                                        $jq('#fav-books').removeClass('d-none')
                                        $jq('#fav-books').addClass('d-grid')
                                        setStatus('clear');
                                    }
                                    i++

                                    divBook.children[1].children[0].children[0]
                                        .addEventListener(
                                            'click',
                                            function() {
                                                let detailsBook = {
                                                    title,
                                                    locations,
                                                    info,
                                                    isbn: formatedIsbn,
                                                    author,
                                                    creationDate,
                                                    publisher,
                                                    local,
                                                    lib
                                                }
                                                toggleDatailsBook(detailsBook)
                                            })

                                    let tag = divBook.children[1].children[0].children[
                                        1];
                                    tag.addEventListener('click', function() {
                                        if (isbn) {
                                            hasBook({
                                                    isbn: isbn[0]
                                                })
                                                .then(data => {
                                                    if (data.book) {
                                                        removeBook({
                                                            isbn: isbn[
                                                                0
                                                            ]
                                                        })
                                                        tag.className =
                                                            "far fa-bookmark mr-3 ml-auto h4"
                                                    } else {
                                                        let detailsBook = {
                                                            title,
                                                            locations,
                                                            info,
                                                            isbn,
                                                            author,
                                                            creationDate,
                                                            publisher,
                                                            local,
                                                            lib
                                                        }
                                                        saveBook(
                                                            detailsBook)
                                                        tag.className =
                                                            "fas fa-bookmark mr-3 ml-auto h4"
                                                    }
                                                })

                                        } else {
                                            customMsg(
                                                'Não é possível salvar este livro pois este não possui ISBN!',
                                                'msg-danger')
                                        }
                                    })

                                })
                            })
                        }

                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            })


        });
    </script>
@endpush
