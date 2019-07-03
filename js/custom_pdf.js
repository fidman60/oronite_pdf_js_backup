let favoriteBtn = document.getElementById('favoriteBtn');
var canvasTextLayerDiv = document.getElementById("canvasTextLayerDiv");
var currentSearchPage = document.getElementById("currentSearchPage");
var totalSearchPages = document.getElementById("totalSearchPages");
var currentSearchPageNo = 1;
var searchText = '';
var results = [];
var searching = false;
var indexResult = 0;
var __PDF_DOC,
    __CURRENT_PAGE = 1,
    __TOTAL_PAGES,
    __PAGE_RENDERING_IN_PROGRESS = 0,
    __CANVAS = $('#pdf-canvas').get(0),
    __CANVAS_CTX = __CANVAS.getContext('2d'),
    __PDF_SCALE = -1;
// thumbnail
var pages = [], heights = [], width = 0, height = 0,currentPage=1;

console.log(favoritePages);

function draw() {
    var canvas = document.createElement('canvas'), ctx = canvas.getContext('2d');
    canvas.width = width;
    canvas.height = height;
    for(var i = 0; i < pages.length; i++)
        ctx.putImageData(pages[i], 0, heights[i]);
    document.getElementById('thumbnail').appendChild(canvas);
}

function fidman(event){
    event.preventDefault();

    if(searching) return;

    searchText = document.getElementById('searchInput').value.toLowerCase().trim();

    results = [];
    indexResult = 0;
    if (searchText.length > 1) {
        currentSearchPageNo = 0;
        const searchIcon = document.getElementById("searchIcon");
        searching = true;

        searchIcon.classList.remove("fa-search");
        searchIcon.classList.add("fa-spin","fa-spinner");

        var promise = new Promise(function (resolve, reject) {
            if (__PDF_DOC){
                resolve(__PDF_DOC);
            } else {
                reject(new Error("No no no "));
            }
        });

        promise
            .then(function (doc) {
                for (var i = 1; i <= doc.numPages; i++)
                    results.push(searchPage(doc, i));
                return Promise.all(results);
            })
            .then(function (newResults) {
                results = newResults.filter(function (result) {
                    return result !== undefined;
                });
                searching = false;
                searchIcon.classList.remove("fa-spin","fa-spinner");
                searchIcon.classList.add("fa-search");
                if (results.length > 0) {
                    currentSearchPageNo = 1;
                    currentSearchPage.innerText = currentSearchPageNo+'';
                    totalSearchPages.innerText = results.length+'';
                    showPage(results[0]);
                } else {
                    showPage(__CURRENT_PAGE);
                    currentSearchPageNo = 0;
                    currentSearchPage.innerText = currentSearchPageNo+'';
                    totalSearchPages.innerText = 0+'';
                }
            })
            .catch(function (error) {
                console.log(error);
            });
    }
}

function nextSearch(event){
    if(event) event.preventDefault();
    if(results.length > 0)
        if(indexResult < results.length - 1){
            currentSearchPage.innerText = ++currentSearchPageNo+'';
            showPage(results[++indexResult]);
        }
}

function previousSearch(event){
    event.preventDefault();
    if(results.length > 0)
        if(indexResult > 0){
            currentSearchPage.innerText = --currentSearchPageNo+'';
            showPage(results[--indexResult]);
        }
}

showPDF('pdf/pdf.pdf');

function insertImagesThumbnail(canvas){
    /*
    var html = '<div id="'+('p'+currentPage)+'" class="thumbnailItem '+(__CURRENT_PAGE === currentPage ? 'activeThumbnailItem':'' )+'"><a href="'+currentPage+'" id="'+currentPage+'"><img src="'+canvas.toDataURL('image/jpeg')+'"/></a></div>';
    document.getElementById('thumbnail').innerHTML+=html;

    var html2 = '<div id="'+('pp'+currentPage)+'" class="thumbnailItem '+(__CURRENT_PAGE === currentPage ? 'activeThumbnailItem':'' )+'"><a href="a'+currentPage+'" id="'+currentPage+'a"><img src="'+canvas.toDataURL('image/jpeg')+'"/></a></div>';

    if(favoritePages.find(function (page) {
        return page === currentPage;
    })){
        document.getElementById('favoritesThumbnail').innerHTML+=html2;
    }
    */
    var image = document.createElement('img');
    var a = document.createElement('a');
    var div = document.createElement('div');

    image.src = canvas.toDataURL('image/jpeg');
    div.classList.add("thumbnailItem");
    if (__CURRENT_PAGE === currentPage) div.classList.add("activeThumbnailItem");
    a.id = currentPage;
    a.href = currentPage;
    div.id = 'p'+currentPage;
    a.appendChild(image);
    div.appendChild(a);
    thumbnail.appendChild(div);
    a.addEventListener('click',function (e) {
        e.preventDefault();
        var items = document.getElementsByClassName('thumbnailItem');
        for (var i=0;i<items.length;i++) {
            items[i].classList.remove('activeThumbnailItem');
        }
        e.currentTarget.parentNode.classList.add('activeThumbnailItem');
        showPage(parseInt(e.currentTarget.id));
    });

    if(favoritePages.find(function (page) {
        return page === currentPage;
    })){
        var clonedDiv = div.cloneNode(true);
        clonedDiv.id = 'f'+currentPage;
        clonedDiv.getElementsByTagName('a')[0].id = currentPage+'f';
        clonedDiv.getElementsByTagName('a')[0].addEventListener('click',function(e) {
            e.preventDefault();
            var items = document.getElementsByClassName('thumbnailItem');
            for (var i=0;i<items.length;i++) {
                items[i].classList.remove('activeThumbnailItem');
            }
            e.currentTarget.parentNode.classList.add('activeThumbnailItem');
            showPage(parseInt(e.currentTarget.id));
        });
        document.getElementById('favoritesThumbnail').appendChild(clonedDiv);
    }
}

function showPDF(pdf_url) {
    $("#pdf-loader").show();
    PDFJS.workerSrc = "js/pdf.worker.js";

    PDFJS.getDocument({ url: pdf_url })
        .then(function(pdf_doc) {
            __PDF_DOC = pdf_doc;
            __TOTAL_PAGES = __PDF_DOC.numPages;

            // Hide the pdf loader and show pdf container in HTML
            $("#pdf-loader").hide();
            $("#pdf-contents").show();
            $("#pdf-total-pages").text(__TOTAL_PAGES+4);

            document.addEventListener('keyup',function (e) {
                if (e.keyCode === 38 || e.keyCode === 39){
                    if (__CURRENT_PAGE < __TOTAL_PAGES)
                        showPage(__CURRENT_PAGE+1);
                } else if (e.keyCode === 37 || e.keyCode === 40){
                    if (__CURRENT_PAGE > 1)
                        showPage(__CURRENT_PAGE-1);
                }
            });

            getPage();
            function getPage() {
                pdf_doc.getPage(currentPage).then(function(page) {
                    var viewport = page.getViewport(.25);
                    var canvas = document.createElement('canvas') , ctx = canvas.getContext('2d');
                    var renderContext = { canvasContext: ctx, viewport: viewport };
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;
                    page.render(renderContext).then(function() {
                        pages.push(ctx.getImageData(0, 0, canvas.width, canvas.height));
                        heights.push(height);
                        height += canvas.height;
                        if (width < canvas.width) width = canvas.width;
                        if (currentPage < pdf_doc.numPages) {
                            var promise = Promise.resolve(insertImagesThumbnail(canvas));
                            promise.then(function () {
                                currentPage++;
                                getPage();
                            });
                        }
                    });
                });
            }

            // Show the first page
            showPage(__CURRENT_PAGE);
        }).catch(function(error) {
        // If error re-show the upload button
        $("#pdf-loader").hide();
        $("#upload-button").show();
        alert(error.message);
    });
}

function showPage(page_no) {
    if (__PAGE_RENDERING_IN_PROGRESS) return;

    __PAGE_RENDERING_IN_PROGRESS = 1;
    __CURRENT_PAGE = page_no;

    // verify if the current page exists in favorites
    const xhttp = new XMLHttpRequest();

    xhttp.open("GET", "request/favorites.php?action=exists&page="+__CURRENT_PAGE, true);
    xhttp.send();

    favoriteBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

    xhttp.addEventListener('readystatechange',function () {
        if (this.readyState === 4 && this.status === 200){
            const rep = JSON.parse(this.responseText);
            if (rep.status === true) favoriteBtn.innerHTML = '<i class="fas fa-heart"></i>';
            else favoriteBtn.innerHTML = '<i class="far fa-heart"></i>';
        }
    });


    // show page

    document.getElementById('text-layer').innerHTML = "";

    // Disable Prev & Next buttons while page is being loaded
    $("#pdf-next, #pdf-prev","#pdf-first","#pdf-last").attr('disabled', 'disabled');

    // While page is being rendered hide the canvas and show a loading message
    $("#pdf-canvas").hide();
    $("#page-loader").show();

    // Update current page in HTML
    if (parseInt(page_no)<=2) {
        $("#pdf-current-page").text(page_no);
    }else {
        $("#pdf-current-page").text(page_no+4);
    }

    // Fetch the page
    __PDF_DOC.getPage(page_no).then(function(page) {
        canvasTextLayerDiv.scrollLeft = 0;
        canvasTextLayerDiv.scrollTop = 0;
        // As the canvas is of a fixed width we need to set the scale of the viewport accordingly
        __CANVAS.width = $(window).width();

        if (__PDF_SCALE < 0){
            if (window.matchMedia("(max-width: 767px)").matches){
                __PDF_SCALE = 0.5;
            }else{
                __PDF_SCALE = 1.25;
            }
            //__PDF_SCALE = __CANVAS.width / page.getViewport(1).width;
        }

        // Get viewport of the page at required scale
        var viewport = page.getViewport(__PDF_SCALE);

        var canvas = document.getElementById('pdf-canvas');
        canvas.width = viewport.width - 5;
        canvas.height = viewport.height;
        //canvas.style.width = "100%";
        //canvas.style.height = "auto";

        // Set canvas height
        __CANVAS.height = viewport.height;

        var renderContext = {
            canvasContext: __CANVAS_CTX,
            viewport: viewport
        };



        page.render(renderContext).then(function() {
            __PAGE_RENDERING_IN_PROGRESS = 0;

            // Re-enable Prev & Next buttons
            $("#pdf-next, #pdf-prev","#pdf-first","#pdf-last").removeAttr('disabled');

            // Show the canvas and hide the page loader
            $("#pdf-canvas").show();
            $("#page-loader").hide();
            // Returns a promise, on resolving it will return text contents of the page
            return page.getTextContent();
        }).then(function(textContent) {
            // PDF canvas
            var pdf_canvas = $("#pdf-canvas");

            // Canvas offset
            var canvas_offset = pdf_canvas.offset();

            // Canvas height
            var canvas_height = pdf_canvas.get(0).height;

            // Canvas width
            var canvas_width = pdf_canvas.get(0).width;

            // Assign CSS to the text-layer element
            $("#text-layer").css({ left: canvas_offset.left + 'px', top: canvas_offset.top + 'px', height: canvas_height + 'px', width: canvas_width + 'px' });
            $("#text-layer").css({ left: (canvas_offset.left-72) + 'px', top: '0px', height: canvas_height + 'px', width: canvas_width + 'px' });

            // Pass the data to the method for rendering of text over the pdf canvas.
            PDFJS.renderTextLayer({
                textContent: textContent,
                container: $("#text-layer").get(0),
                viewport: viewport,
                textDivs: []
            });

            const textLayer = document.getElementById('text-layer');

            if(searchText.length > 0){
                const regex = new RegExp(searchText,'ig');
                textLayer.innerHTML = textLayer.innerHTML.replace(regex, "<span class='highlight'>"+searchText+"</span>");
            }
        });
    });
}

function showPageMenu(page_no) {
    if (__PAGE_RENDERING_IN_PROGRESS) return;
    page_no=page_no-4;

    __PAGE_RENDERING_IN_PROGRESS = 1;
    __CURRENT_PAGE = page_no;

    // verify if the current page exists in favorites
    const xhttp = new XMLHttpRequest();

    xhttp.open("GET", "request/favorites.php?action=exists&page="+(__CURRENT_PAGE > 2 ? __CURRENT_PAGE + 4 : __CURRENT_PAGE), true);
    xhttp.send();

    favoriteBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

    xhttp.addEventListener('readystatechange',function () {
        if (this.readyState === 4 && this.status === 200){
            const rep = JSON.parse(this.responseText);
            console.log("from show page");
            console.log(rep);
            if (rep.status === true) favoriteBtn.innerHTML = '<i class="fas fa-heart"></i>';
            else favoriteBtn.innerHTML = '<i class="far fa-heart"></i>';
        }
    });


    // show page

    document.getElementById('text-layer').innerHTML = "";

    // Disable Prev & Next buttons while page is being loaded
    $("#pdf-next, #pdf-prev","#pdf-first","#pdf-last").attr('disabled', 'disabled');

    // While page is being rendered hide the canvas and show a loading message
    $("#pdf-canvas").hide();
    $("#page-loader").show();

    // Update current page in HTML
    if (parseInt(page_no)<=2) {
        $("#pdf-current-page").text(page_no);
    } else {
        $("#pdf-current-page").text(page_no+4);
    }

    // Fetch the page
    __PDF_DOC.getPage(page_no).then(function(page) {
        canvasTextLayerDiv.scrollLeft = 0;
        canvasTextLayerDiv.scrollTop = 0;
        // As the canvas is of a fixed width we need to set the scale of the viewport accordingly
        __CANVAS.width = $(window).width();

        if (__PDF_SCALE < 0){
            if (window.matchMedia("(max-width: 767px)").matches){
                __PDF_SCALE = 0.5;
            }else{
                __PDF_SCALE = 1.25;
            }
            //__PDF_SCALE = __CANVAS.width / page.getViewport(1).width;
        }

        // Get viewport of the page at required scale
        var viewport = page.getViewport(__PDF_SCALE);

        var canvas = document.getElementById('pdf-canvas');
        canvas.width = viewport.width - 5;
        canvas.height = viewport.height;
        //canvas.style.width = "100%";
        //canvas.style.height = "auto";

        // Set canvas height
        __CANVAS.height = viewport.height;

        var renderContext = {
            canvasContext: __CANVAS_CTX,
            viewport: viewport
        };



        page.render(renderContext).then(function() {
            __PAGE_RENDERING_IN_PROGRESS = 0;

            // Re-enable Prev & Next buttons
            $("#pdf-next, #pdf-prev","#pdf-first","#pdf-last").removeAttr('disabled');

            // Show the canvas and hide the page loader
            $("#pdf-canvas").show();
            $("#page-loader").hide();
            // Returns a promise, on resolving it will return text contents of the page
            return page.getTextContent();
        }).then(function(textContent) {
            // PDF canvas
            var pdf_canvas = $("#pdf-canvas");

            // Canvas offset
            var canvas_offset = pdf_canvas.offset();

            // Canvas height
            var canvas_height = pdf_canvas.get(0).height;

            // Canvas width
            var canvas_width = pdf_canvas.get(0).width;

            // Assign CSS to the text-layer element
            $("#text-layer").css({ left: canvas_offset.left + 'px', top: canvas_offset.top + 'px', height: canvas_height + 'px', width: canvas_width + 'px' });
            $("#text-layer").css({ left: (canvas_offset.left-72) + 'px', top: '0px', height: canvas_height + 'px', width: canvas_width + 'px' });

            // Pass the data to the method for rendering of text over the pdf canvas.
            PDFJS.renderTextLayer({
                textContent: textContent,
                container: $("#text-layer").get(0),
                viewport: viewport,
                textDivs: []
            });

            const textLayer = document.getElementById('text-layer');

            if(searchText.length > 0){
                const regex = new RegExp(searchText,'ig');
                textLayer.innerHTML = textLayer.innerHTML.replace(regex, "<span class='highlight'>"+searchText+"</span>");
            }
        });
    });
}


// Previous page of the PDF
$("#pdf-prev").on('click', function() {
    if(__CURRENT_PAGE != 1)
        showPage(--__CURRENT_PAGE);
});

// Next page of the PDF
$("#pdf-next").on('click', function() {
    if(__CURRENT_PAGE != __TOTAL_PAGES)
        showPage(++__CURRENT_PAGE);
});

// First page of the PDF
$("#pdf-first").on('click', function() {
    // if(__CURRENT_PAGE != __TOTAL_PAGES)
    showPage(1);
});

// Next page of the PDF
$("#pdf-last").on('click', function() {
    // if(__CURRENT_PAGE != __TOTAL_PAGES)
    showPage(__TOTAL_PAGES);
});


function searchPage(doc, pageNumber) {
    return doc.getPage(pageNumber).then(function (page) {
        return page.getTextContent();
    }).then(function (content) {
        // Search combined text content using regular expression
        var text = content.items.map(function (i) { return i.str; }).join('');
        var re = new RegExp("(.{0,20})" + searchText + "(.{0,20})", "gi"), m;
        var lines = [];
        if (m = re.exec(text)) {
            return pageNumber;
        }
        return undefined;
    });
}

var zoominbutton = document.getElementById("zoominbutton");
zoominbutton.onclick = function() {
    __PDF_SCALE = __PDF_SCALE + 0.25;
    showPage(__CURRENT_PAGE);
};

var zoomoutbutton = document.getElementById("zoomoutbutton");
zoomoutbutton.onclick = function() {
    if (__PDF_SCALE <= 0.25) {
        return;
    }
    __PDF_SCALE = __PDF_SCALE - 0.25;
    showPage(__CURRENT_PAGE);
};

const searchBtn = document.getElementById('searchBtn');
const searchBlock = document.getElementById("searchBlock");
searchBtn.addEventListener('click',function (e) {
    e.preventDefault();
    if (searchBlock.style.display === "flex") {
        searchBtn.style.color = "#31353D";
        searchBlock.style.display = "none";
    } else {
        moveToPageBtn.style.color = "#31353D";
        searchBtn.style.color = "orange";
        moveToPageBlock.style.display = "none";
        searchBlock.style.display = "flex";
        // if (window.matchMedia("(max-width: 767px)").matches){
        //     searchBlock.style.width = $(window).width()+"px";
        // }
    }
});

const moveToPageBtn = document.getElementById("moveToPageBtn");
const moveToPageBlock = document.getElementById("moveToPageBlock");
moveToPageBtn.addEventListener('click',function (e) {
    e.preventDefault();
    if (moveToPageBlock.style.display === "flex") {
        moveToPageBtn.style.color = "#31353D";
        moveToPageBlock.style.display = "none";
    } else {
        searchBtn.style.color = "#31353D";
        moveToPageBtn.style.color = "orange";
        moveToPageBlock.style.display = "flex";
        searchBlock.style.display = "none";
    }
});

function moveToPage(event) {
    event.preventDefault();

    const page = parseInt(document.getElementById("moveToPageInput").value);
    if (page > 0 && page <= __TOTAL_PAGES)
        showPageMenu(page);
}


var isfullscreen=false;
const fullscreenbtn = document.getElementById("fullscreenbtn");
fullscreenbtn.addEventListener('click',function (e) {
    e.preventDefault();
    if (isfullscreen) {
        document.exitFullscreen();
        isfullscreen=false;
    }else{
        var elem = document.getElementById("pdf-main-container");
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) { /* Firefox */
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) { /* IE/Edge */
            elem.msRequestFullscreen();
        }
        $('#pdf-main-container').addClass('fullscreen');
        isfullscreen=true;
    }
});

let loadingFavoriteRequest = false;
favoriteBtn.addEventListener('click', function (e) {
    e.preventDefault();

    if (loadingFavoriteRequest) return;

    loadingFavoriteRequest = true;

    const xhttp = new XMLHttpRequest();

    xhttp.open("GET", "request/favorites.php?action=toggle&page="+__CURRENT_PAGE, true);
    xhttp.send();

    favoriteBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

    xhttp.addEventListener('readystatechange',function () {
        if (this.readyState === 4 && this.status === 200){
            loadingFavoriteRequest = false;
            const rep = JSON.parse(this.responseText);
            console.log("from toggle btn");
            console.log(rep);
            if (rep.status === true) {
                if (rep.action === 'add'){
                    favoriteBtn.innerHTML = '<i class="fas fa-heart"></i>';
                } else
                    favoriteBtn.innerHTML = '<i class="far fa-heart"></i>';

                // update favorites thumbnail
                var favorites = rep.pages;
                favoritesThumbnail.innerHTML = '';
                for (var i=0;i<favorites.length;i++){
                    var div = document.getElementById('p'+favorites[i]);
                    var currentPage = parseInt(div.getElementsByTagName('a')[0].id);
                    console.log(currentPage);
                    var clonedDiv = div.cloneNode(true);
                    clonedDiv.id = 'f'+currentPage;
                    clonedDiv.getElementsByTagName('a')[0].id = currentPage+'f';
                    clonedDiv.getElementsByTagName('a')[0].addEventListener('click',function (e) {
                        e.preventDefault();
                        var items = document.getElementsByClassName('thumbnailItem');
                        for (var i=0;i<items.length;i++) {
                            items[i].classList.remove('activeThumbnailItem');
                        }
                        e.currentTarget.parentNode.classList.add('activeThumbnailItem');
                        showPage(parseInt(e.currentTarget.id));
                    });
                    favoritesThumbnail.appendChild(clonedDiv);
                }

            } else {
                console.log("something went wrong");
            }
        } else if(this.readyState === 4 && this.status === 200){
            loadingFavoriteRequest = false;
            alert("Sorry something went wrong, please reload the page.");
        }
    });
});

let toggleThumbnailBtn = document.getElementById('toggleThumbnailBtn');
var thumbnail = document.getElementById('thumbnail');
toggleThumbnailBtn.addEventListener('click',function (e) {
    e.preventDefault();
    if (thumbnail.offsetLeft > 0){
        toggleThumbnailBtn.style.color = "black";
        thumbnail.style.left = "-240px";
    } else {
        toggleThumbnailBtn.style.color = "orange";
        favoritesThumbnail.style.left = "-240px";
        toggleThumbnailFavoritesBtn.style.color = "black";
        thumbnail.style.left = "0px";
    }
});

let toggleThumbnailFavoritesBtn = document.getElementById('toggleThumbnailFavoritesBtn');
var favoritesThumbnail = document.getElementById('favoritesThumbnail');
toggleThumbnailFavoritesBtn.addEventListener('click',function () {
    if (favoritesThumbnail.offsetLeft > 0){
        toggleThumbnailFavoritesBtn.style.color = "black";
        favoritesThumbnail.style.left = "-240px";
    } else {
        toggleThumbnailFavoritesBtn.style.color = "orange";
        toggleThumbnailBtn.style.color = "black";
        thumbnail.style.left = "-240px";
        favoritesThumbnail.style.left = "0px";
    }
});

// polyfill
if (!Array.prototype.find) {
    Array.prototype.find = function(predicate) {
        if (this == null) {
            throw new TypeError('Array.prototype.find called on null or undefined');
        }
        if (typeof predicate !== 'function') {
            throw new TypeError('predicate must be a function');
        }
        var list = Object(this);
        var length = list.length >>> 0;
        var thisArg = arguments[1];
        var value;

        for (var i = 0; i < length; i++) {
            value = list[i];
            if (predicate.call(thisArg, value, i, list)) {
                return value;
            }
        }
        return undefined;
    };
}