<script src="{{ URL::asset('DataTable/jquery-3.7.0.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>


<script src="{{ URL::asset('DataTable/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('DataTable/dataTables.bootstrap5.min.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/xm4wm53gf1zozbblvgjnepvd8wmg1u8p0omo5tt4p9gk6pek/tinymce/5/tinymce.min.js">
</script>
<script>
    $(document).ready(function() {
        $("#add,#my-form").submit(function(e) {
            let values = [];

            $(".order").each(function() {
                values.push($(this).val());
            });
            let uniqueValues = [...new Set(values)];

            if (uniqueValues.length < values.length) {
                alert("Duplicate Ordering found!");
                e.preventDefault();
            }
        });

    });
</script>

<script>
    function initTinymce(selector) {
        tinymce.init({
            selector: selector,
            menubar: false,
            plugins: ["image"],
            toolbar: "undo redo | alignleft aligncenter alignright | image",
            images_upload_url: '{{ route('ajax.upload.image') }}',
            automatic_uploads: true,
            file_picker_types: "image",
            relative_urls: true,
            document_base_url: 'http://www.example.com/path1/',
            height: 300
        });

    }
    initTinymce('.editor');
</script>
{{-- End TinyMCE Js --}}

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "paging": false
        });

    });
</script>

<script>
    let editorCounter = 0;


    $(document).on("click", ".add_row,#addEditorButton", function() {

        var lastOrderValue = $(".order").last().val();

        lastOrderValue++;
        editorCounter++;

        let editorId = "editor_" + editorCounter;

        let newEditorHtml = `<textarea name="froala_content[]" id="${editorId}" class="editor"></textarea>`;

        let newOrderHtml = `   <input type="number" name="order[]" min="1" value="${lastOrderValue}" class="form-control order"
        style="width: 75.6px;margin-bottom: 40px;margin-top: 0px;">`;
        var row = `  <div style="width: 100%;display: flex;justify-content: space-between;align-items: center;"
                            class="main_row">
                            <div class="row rounded cancel"
                                style="background: #8080801a;margin-bottom: 20px;width: 1000px;margin-left: 0px;">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default"
                                        value="" name="title[]"
                                        aria-describedby="inputGroup-sizing-default">
                                </div>
                              ${newEditorHtml}


                            </div>
                            <div class="actions" style="display: flex;flex-direction: column;">
                                      ${newOrderHtml}
                                <button type="button" style="height: 50px;margin-bottom: 10px;"
                                    class="btn btn-outline-primary add_row">Add</button>
                                <button type="button" style="height: 50px;"
                                    class="btn btn-outline-danger delete_row">Delete</button>

                            </div>
                        </div>`
        $(".parent_text_editor").append(row);
        var selector = `#${editorId}`;
        initTinymce(selector);
 
    });
</script>



<script>
    $(document).on("click", ".delete_row", function() {
        var parent = $(this).closest(".main_row");
        var totalRows = $(".main_row").length;

        if (totalRows === 1) {

            alert("This Is Last Row")
        } else {

            parent.remove();

        }
    });
</script>

<script>
    $(document).ready(function() {
        $(".options").change(function() {
            let option = $(this).val();
            $('.show_images').addClass('d-none');

            if (option == "banner") {
                $(".gallery, .video, .before_after").addClass('d-none');
                $(".banner").removeClass('d-none');
            }
            if (option == "gallery") {
                $(".banner, .video, .before_after").addClass('d-none');
                $(".gallery").removeClass('d-none');
            }
            if (option == "video") {
                $(".banner, .gallery, .before_after").addClass('d-none');
                $(".video").removeClass('d-none');
            }
            if (option == "before_after") {
                $(".banner, .gallery, .video").addClass('d-none');
                $(".before_after").removeClass('d-none');
            }
        });
    });
</script>
