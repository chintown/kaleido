<?php
    session_start();
    $path_fix_before_inc = '../';
    require $path_fix_before_inc.'core/main.inc.php';
    require('template/jquery.mobile.header.php');
    //require 'core/authentication.php';
?>

<div data-role="content" id="lookup" >
    <form action="" id="search_form" data-ajax="false">
            <table>
                <tr>
                    <td width="60%">
                        <fieldset data-role="controlgroup" data-type="horizontal">
                            <input type="radio" name="source" id="radio-choice-1" value="lookup" data-mini="true" <?= ($r_source == 'lookup') ? 'checked="checked"' : '' ?>>
                            <label for="radio-choice-1">L</label>

                            <input type="radio" name="source" id="radio-choice-2" value="yahoo" data-mini="true" <?= ($r_source == 'yahoo') ? 'checked="checked"' : '' ?>>
                            <label for="radio-choice-2">Y</label>

                            <input type="radio" name="source" id="radio-choice-4" value="wordnik" data-mini="true" <?= ($r_source == 'wordnik') ? 'checked="checked"' : '' ?>>
                            <label for="radio-choice-4">W</label>

                            <input type="radio" name="source" id="radio-choice-5" value="ciku" data-mini="true" <?= ($r_source == 'ciku') ? 'checked="checked"' : '' ?>>
                            <label for="radio-choice-5">C</label>

                            <input type="radio" name="source" id="radio-choice-6" value="termly" data-mini="true" <?= ($r_source == 'termly') ? 'checked="checked"' : '' ?>>
                            <label for="radio-choice-6">T</label>
                        </fieldset>
                    </td>
                    <td>
                        <input type="search" name="query" id="search-basic" value="<?=$r_query?>" data-mini="true">
                    </td>
                </tr>
            </table>

    </form>
    <div class="webview">
        <iframe id="iframe" src="<?=$r_url?>" frameborder="0" width="100%" scrolling="no"></iframe>
    </div>
</div>

<?php
    add_extra_footer('lookup.footer.php');
    require('template/jquery.mobile.footer.php');
?>
