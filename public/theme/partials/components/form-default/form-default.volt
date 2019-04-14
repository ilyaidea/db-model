{{ assetsCollection.addCss('theme/partials/components/form-default/form-default.css') }}
{{ assetsCollection.addJs('theme/partials/components/form-default/form-default.js') }}

<div id="main" class="l-container" role="main">
    <h1>form-default</h1>
    <form action="" class="form">
        <div class="form-controlGroup">
            <input class="form-input" type="text" name="" id="firstname" required/>
            <label class="form-label" for="firstname">First name</label>
            <i class="form-inputBar"></i>
        </div>

        <div class="form-controlGroup">
            <input class="form-input" type="text" name="" id="lastname" required/>
            <label class="form-label" for="lastname">Last name</label>
            <i class="form-inputBar"></i>
        </div>

        <div class="form-controlGroup">
            <input class="form-input" type="email" name="" id="email" required/>
            <label class="form-label" for="email">Email</label>
            <i class="form-inputBar"></i>
        </div>

        <div class="form-controlGroup">
            <textarea class="form-input form-input--textarea" id="description" name="name" required></textarea>
            <label class="form-label" for="description">Description</label>
            <i class="form-inputBar"></i>
        </div>

        <div class="form-controlGroup">
            <select id="title" name="title" class="form-input form-input--select">
                <option value="--">Select title</option>
                <option value="Mr">Mr</option>
                <option value="Mrs">Mrs</option>
            </select>
            <label class="form-label" for="title">Title</label>
            <i class="form-inputBar"></i>
        </div>

        <div class="file-upload-wrapper" data-text="Select your file!">
            <input name="file-upload-field" type="file" class="file-upload-field" value="">
        </div>

        <div class="form-controlGroup">
            <label class="control">
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                This is a radio
            </label>
            <label class="control">
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" checked>
                This is a radio
            </label>
        </div>


        <div class="form-controlGroup">
            <label class="control">
                <input type="checkbox" value="check1">
                This is a checkbox
            </label>
            <label class="control">
                <input type="checkbox" value="check1">
                This is a checkbox
            </label>
        </div>
        <div class="form-controlGroup">
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">
                Submit
            </button>
        </div>
    </form>
</div>