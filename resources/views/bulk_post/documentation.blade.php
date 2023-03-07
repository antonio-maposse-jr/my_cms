<div class="modal-content">
    <div class="modal-header">
        <h3 class="modal-title" id="categoriesExampleModalLabel">{{ __('messages.bulk_post.documentation') }}</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <table class="table">
            <tr>
                <th>Field</th>
                <th>Description</th>
            </tr>
            <tr>
                <td>title</td>
                <td>
                    Data Type: String
                    <br>
                    <strong>Required</strong>
                    <br>
                    <span>Example: Test Title</span>
                </td>
            </tr>
            <tr>
                <td>description</td>
                <td>
                    Data Type: longText
                    <br>
                    <strong>Required</strong>
                    <br>
                    <span>Example: Test description About this post</span>
                </td>
            </tr> 
            <tr>
                <td>keywords</td>
                <td>
                    Data Type: String
                    <br>
                    <strong>Required</strong>
                    <br>
                    <span>Example: examination, careful, goals</span>
                </td>
            </tr>
            <tr>
                <td>image</td>
                <td>
                    Data Type: String
                    <br>
                    <strong>Required</strong>
                    <br>
                    <strong>Type : JPG,PNG</strong>
                    <br>
                    <span>Example: https://infynews.nyc3.digitaloceanspaces.com/post%20image/608/oxford-1.jpg</span>
                </td>
            </tr>
            <tr>
                <td>lang_id</td>
                <td>
                    Data Type: Integer
                    <br>
                    <strong>Required</strong>
                    <br>
                    <span>Example:1</span>
                </td>
            </tr>
            <tr>
                <td>category_id</td>
                <td>
                    Data Type: Integer
                    <br>
                    <strong>Required</strong>
                    <br>
                    <span>Example:1</span>
                </td>
            </tr> 
            <tr>
                <td>sub_category_id</td>
                <td>
                    Data Type: Integer
                    <br>
                    <strong>Optional</strong>
                    <br>
                    <span>Example:1</span>
                </td>
            </tr>
            <tr>
                <td>tags</td>
                <td>
                    Data Type: String
                    <br>
                    <strong>Required</strong>
                    <br>
                    <span>Example:advantages,power</span>
                </td>
            </tr>
            <tr>
                <td>visibility</td>
                <td>
                    Data Type: Boolean
                    <br>
                    <strong>Required</strong>
                    <br>
                    <span>1 OR 0</span>
                </td>
            </tr>
        </table>
    </div>
</div>
