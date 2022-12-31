function reset() {
    $.each(serialize, function (index, value) {
        $(`input[name="${value.name}"]`).val("");
        $(`textarea[name="${value.name}"]`).val("");

        /** Single Select */
        $(`select[name="${value.name}"]`).val("").change();

        /** Multi Select */
        $(`select[name="${value.name}"]`).val(new Array()).change();
    });

    $(".password-guide").hide();
}

function setInput(name, value) {
    console.log(name);
    $(`input[name="${name}"]`).val(value);
    $(`textarea[name="${name}"]`).text(value);
    $(`select[name="${name}"]`).val(value).change();

    if ($.isArray(value)) {
        var selectedValues = new Array();
        $.each(value, function (index, data) {
            selectedValues[index] = data.id;
        });
        $(`select[name="${name}"]`).val(selectedValues).change();
    }
}

$("#formModal").on("shown.bs.modal", function (e) {
    $(`.error`).empty();
});

function setError(errList) {
    $.each(errList, function (elName, errData) {
        let element = $(`div[field="${elName}"] .error`);

        element.empty();

        $.each(errData, function (index2, errMessage) {
            element.append(`${errMessage}<br>`);
        });
    });
}

$(".create").on("click", function () {
    reset();
    form.attr("action", `${window.page_url}/store`);
});

$("#submit").on("click", function () {
    // $.each(form.serializeArray(), function (index, data) {
    //     console.log("index: " + index);
    //     console.log("data: " + data.value);
    // });

    // console.log(form.serialize());

    var formData = new FormData(window.form[0]);

    $.ajax({
        type: form.attr("method"),
        url: form.attr("action"),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (res) {
            $("#table").DataTable().ajax.reload();
            $("#formModal").modal("hide");
            toastr.success("Data berhasil disimpan", "Notifikasi");
        },
        error: function (err) {
            let res = err.responseJSON;
            $(`.error`).empty();
            setError(res);
            toastr.error("Data tidak valid", "Notifikasi");
        },
    });
});

$("#table tbody").on("click", ".update", function () {
    $("#formModal").modal("show");

    var data = window.table.row($(this).parents("tr")).data();

    window.form.attr("action", `${window.page_url}/update/${data.id}`);

    reset();

    $.each(serialize, function (index, value) {
        let value_name = value.name.replace("[]", "");
        setInput(value.name, data[value_name]);
    });
    $(".password-guide").show();
});

$("#table tbody").on("click", ".delete", function () {
    var data = window.table.row($(this).parents("tr")).data();

    Swal.fire({
        title: "Anda Yakin?",
        text: "Perubahan tidak dapat dikembalikan!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "post",
                url: `${window.page_url}/destroy/${data.id}`,
                success: function (res) {
                    $("#table").DataTable().ajax.reload();
                    Swal.fire(
                        "Terhapus!",
                        "Data anda sudah dihapus.",
                        "success"
                    );
                },
            });
        }
    });
});
