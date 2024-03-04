var paginate = 1;
var dataExplore = [];
loadMoreData(paginate);
$(window).scroll(function(){
    if ($(window).scrollTop() + $(window).height() >= $(document).height()){
        paginate++;
        loadMoreData(paginate);
    }
});

function loadMoreData(paginate) {
    var userlike; // Deklarasi userlike di sini
    var urlnya = window.location.href.split("?")[1];
    var parameter = new URLSearchParams(urlnya);
    var cariValue = parameter.get('cari')
    if(cariValue == 'null'){
        url = window.location.origin + '/getDataExplore/' + '?page=' + paginate;
    } else {
        url = window.location.origin + '/getDataExplore?cari='+ cariValue + '&page='+ paginate
    }
    $.ajax({ 
        url: url,
        type: "GET",
        dataType: "JSON",
        success: function (e) {
            console.log(e);
            e.data.data.map((x) => {
                var hasilPencarian = x.like.filter(function (hasil) {
                    return hasil.user_id === e.Userid;
                })
                if (hasilPencarian.length <= 0) {
                    userlike = 0;
                } else {
                    userlike = hasilPencarian[0].user_id;
                }
                let datanya = {
                    id: x.id,
                    judul: x.judul_foto,
                    deskripsi: x.deskripsi,
                    foto: x.lokasi_file,
                    album: x.album_id,
                    user: x.user_id,
                    jml_komentar: x.komentar_count,
                    jml_like: x.like_count,
                    UseridLike: userlike,
                    useractive: e.Userid
                }
                dataExplore.push(datanya)
                console.log(userlike)
                console.log(e.Userid)
            })
            getExplore()
        },
        error: function (jqXHR, textStatus, errorThrown) {

        }
    })



const getExplore =()=>{
    $('#exploredata').html('')
    dataExplore.map((x, i)=>{
        $('#exploredata').append(
            `
            <div class="flex mt-2 bg-white">
            <div class="flex justify-center flex-col px-2 ">
            <a href="/detail/${x.id}">
                    <div class="w-[363px] h-[221px] bg-bgcolor2 overflow-hidden rounded-2xl">
                        <img src="/assets/${x.foto}" alt="" class="w-full transition duration-500 ease-in-out hover:scale-105"/>
                    </div>
                </a>
                <div class="flex flex-wrap items-center justify-between px-2 mt-2">
                    <div>
                        <div class="flex flex-col">
                            <div>
                                ${x.judul}
                            </div>
                        </div>
                    </div>
                    <div>
                        <small>${x.jml_komentar}</small>
                        <a href="/detail/${x.id}">
                        <span class="bi bi-chat-dots"></span></a>
                        <small>${x.jml_like}</small>
                        <span class="bi ${x.UseridLike === x.useractive ? 'bi-heart-fill text-red-800' : 'bi-heart'} "bi-heart" onclick="like(this, ${x.id})"></span>
                    </div>
                </div>
            </div>
        </div>
            `
        )
    })
}
}

function like(txt, id){
    $.ajax({
        url: window.location.origin +'/like',
        dataType: "JSON",
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            fotoid: id
        },
        success: function(res){
            location.reload()
            // console.log(res)
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('gagal')
        }
    })
}