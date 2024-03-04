var segmentTerakhir = window.location.href.split('/').pop();
console.log('Segment Terakhir:', segmentTerakhir);

$.ajax({
    url: window.location.origin + '/detail/' + segmentTerakhir + '/getdatadetail',
    type: 'GET',
    dataType: 'JSON',
    success: function (res) {
    console.log('Data respons dari server:', res);

    if (res && res.dataDetailFoto && res.dataDetailFoto.lokasi_file) {
        $('#fotodetail').prop('src', '/assets/' + res.dataDetailFoto.lokasi_file);
        $('#judulfoto').html(res.dataDetailFoto.judul_foto);
        $('#deskripsi').html(res.dataDetailFoto.deskripsi);
        $('#like_count').html(res.jumlahdata.like_count);
        $('#komentar_count').html(res.jumlahdata.komentar_count);
        $('#username').html(res.dataDetailFoto.user.nama_lengkap);
        ambilKomentar()
    } else {
        
    }
},
       
error: function (jqXHR, textStatus, errorThrown) {
    console.error('Gagal melakukan permintaan AJAX:', textStatus, errorThrown);
    console.error('Response Text:', jqXHR.responseText);
    console.error('Status Code:', jqXHR.status);
}

});

function ambilKomentar(){
    $.getJSON(window.location.origin +'/detail/getComment/'+segmentTerakhir, function(res){
        console.log(res)
        if(res.data.length === 0){
            $('#listkomentar').html('<div>Belum ada komentar</div>')
        } else {
            comment= []
            res.data.map((x)=>{
                let datacomentar = {
                    Userid: x.user.id,
                    pengirim: x.user.nama_lengkap,
                    user_avatar: x.user.avatar,
                    isikomentar: x.isi_komentar,

                }
                comment.push(datacomentar);
            })
            tampilkankomentar()
        }
    })
    
}

const tampilkankomentar = ()=>{
    $('#listkomentar').html('')
    comment.map((x, i)=>{
        $('#listkomentar').append(`
            <div class="flex flex-row justify-start mt-4">
                <div class="w-1/4">
                    <img src="/fotoprofile/${x.user_avatar}" class="border rounded-full h-10 w-15" alt="">
                </div>
                <div class="flex flex-col ">
                    <h5 class="text-sm"><b>${x.pengirim}</b></h5>
                    <small class="text-xs text-abuabu">${x.isikomentar}</small>
                </div>
            </div>
        `)
    })
}

function kirimkomentar(){
    $.ajax({
        url: window.location.origin +'/detail/kirimkomentar',
        type: 'POST',
        dataType: 'JSON',
        data: {
            _token: $('input[name="_token"]').val(),
            fotoid: segmentTerakhir,
            isi_komentar: $('input[name="textkomentar"]').val()
        },
        success: function(res){
            $('input[name="textkomentar"]').val('');
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('Gagal mengirim komentar')
        }
    })
}

setInterval(ambilKomentar, 500);



