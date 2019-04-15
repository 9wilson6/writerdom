<?php
ob_start();
require_once "../inc/utilities.php";
require_once "../inc/header_links.php";
require_once "../inc/global_functions.php";
$page = "create";
require_once "../components/top_nav.php";
require_once "../dbconfig/dbconnect.php";
?>
<?php
////////////////////////////////////////////////////////////////////////
//////////////////////////////PHP//////////////////////////////////////
$error = null;
$success = null;
require_once "stud_functions.php";
create_post();
ob_flush();
////////////////////////////////////////////////////////////////////////
//////////////////////////////PHP//////////////////////////////////////
?>
<div class="display">
<div class="display__content">
<?php require_once "../components/stud_leftnav.php"?>
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
<h1 class="headingTertiary text-light">Post Assignment</h1>
<div class="card text-center">
<div class="card-header">
<h1 class="text-secondary text-uppercase">Please Add Assignment Details Below</h1>
</div>
<div class="card-body">
<div class="forms2">
<?php if (!empty($error)): ?>
<div class="bg-danger mx-5 px-3 text-center text-light">
<strong><?php echo $error; ?></strong> </div>
<?php elseif (!empty($success)): ?>
<div class="bg-success mx-5 px-3 text-center text-light">
<strong><?php echo $success; ?></strong> </div>
<?php endif?>
<form enctype="multipart/form-data" method="POST" action="createpost">
<!-- /////// -->
<div class="form-group">
<div class="form-row">
<div class="col">
<label for="title" class="forms2__label">Title</label>
<input type="text" name="title" id="title"
class="form-control forms2__input" placeholder="Title" required>
</div>
<div class="col">
<label for="subject" class="forms2__label">Subject</label>
<select name="subject" class="form-control forms2__select" id="subject"
required>
<option value="Accounting">Accounting</option>
<option value="Agricultural Studies">Agricultural Studies</option>
<option value="Anthropology">Anthropology</option>
<option value="Architecture">Architecture</option>
<option value="Art">Art</option>
<option value="Biology">Biology</option>
<option value="Business">Business</option>
<option value="Chemistry">Chemistry</option>
<option value="Computer Science">Computer Science</option>
<option value="Economics">Economics</option>
<option value="Engineering">Engineering</option>
<option value="English">English</option>
<option value="Finance">Finance</option>
<option value="Geography">Geography</option>
<option value="History">History</option>
<option value="Law">Law</option>
<option value="Legal Studies">Legal Studies</option>
<option value="Logistics">Logistics</option>
<option value="Mathematics">Mathematics</option>
<option value="Medicine and Health">Medicine and Health</option>
<option value="Military Science">Military Science</option>
<option value="Nursing">Nursing</option>
<option value="Pharmacy">Pharmacy</option>
<option value="Philosophy">Philosophy</option>
<option value="Psychology">Psychology</option>
<option value="Religion and Theology">Religion and Theology</option>
<option value="Sociology">Sociology</option>
<option value="Sport">Sport</option>
<option value="Web Design">Web Design</option>
</select>
</div>
</div>
</div>
<!-- ///// -->
<div class="form-group">
<div class="form-row">
<div class="col">
<label for="academic_level" class="forms2__label">Academic level</label>
<!-- <select name="subject" class="form-control forms2__select" id="subject" required> -->
<select name="academic_level" class="form-control forms2__select"
id="academic_level" required>
<option value="College">High School</option>
<option value="College">College</option>
<option value="Undergraduate">Undergraduate</option>
<option value="Masters">Masters</option>
<option value="Postgraduate">Postgraduate</option>
<option value="Ph.D">Ph.D</option>
</select>
<!-- <input type="text" name="title" id="title" class="form-control forms2__input" placeholder="First name"> -->
</div>
<div class="col">
<label for="style" class="forms2__label">Style</label>
<select name="style" class="form-control forms2__select" id="style"
required>
<option value="APA">APA</option>
<option value="Chicago">Chicago</option>
<option value="Harvard">Harvard</option>
<option value="IEEE">IEEE</option>
<option value="MLA">MLA</option>
<option value="Oscola">Oscola</option>
<option value="Other (not listed)">Other (not listed)</option>
<option value="Oxford">Oxford</option>
<option value="Turabian">Turabian</option>
<option value="Vancouver">Vancouver</option>
</select>
</div>
</div>
</div>
<!-- ///// -->
<div class="form-group">
<div class="form-row">
<div class="col">
<label for="papertype" class="forms2__label">Type of Paper</label>
<!-- <select name="subject" class="form-control forms2__select" id="subject" required> -->
<select name="papertype" class="form-control forms2__select" id="papertype"
required>
<option value="Admission Essay">Admission Essay</option>
<option value="Annotated Bibliography">Annotated Bibliography</option>
<option value="Article Critique/Review">Article Critique/Review</option>
<option value="Book Review">Book Review</option>
<option value="Coursework">Coursework</option>
<option value="Dissertation">Dissertation</option>
<option value="Editing">Editing</option>
<option value="Essay">Essay</option>
<option value="Lab Report">Lab Report</option>
<option value="Math Problem">Math Problem</option>
<option value="Movie Review">Movie Review</option>
<option value="Multiple Choice (MCQs)">Multiple Choice (MCQs)</option>
<option value="Online Test (No Time Framed)">Online Test (No Time
Framed)</option>
<option value="Online Test (Time framed)">Online Test (Time framed)
</option>
<option value="Other (not listed)">Other (not listed)</option>
<option value="Personal Statement">Personal Statement</option>
<option value="PowerPoint (PPT)">PowerPoint (PPT)</option>
<option value="Programming">Programming</option>
<option value="Questionnaire">Questionnaire</option>
<option value="Research Paper">Research Paper</option>
<option value="Research Proposal">Research Proposal</option>
<option value="Statistics Project">Statistics Project</option>
<option value="Summary">Summary</option>
<option value="Term Paper">Term Paper</option>
<option value="Thesis">Thesis</option>
</select>
<!-- <input type="text" name="title" id="title" class="form-control forms2__input" placeholder="First name"> -->
</div>
<div class="col">
<?php
$date = date("Y-m-d");
$time = date("H:i");
?>
<div class="form-row">
<div class="col">
<label for="datetime" class="forms2__label">days (<small>to
deadline</small>)</label>
<input type="number" name="date" class="form-control forms2__select"
min="0" max="12" id="datetyme" required>
</div>
<div class="col">
<label for="datetime" class="forms2__label">hours (<small>to
deadline</small>)</label>
<input type="number" name="tyme" id="datetyme"
class="form-control forms2__select" max="24" min="0" required>
</div>
</div>
</div>
</div>
</div>
<!-- /////// -->
<div class="form-group">
<div class="form-row">
<div class="col">
<label for="pages" class="forms2__label">Pages</label>
<input type="number" name="pages" id="pages" min="0"
class="form-control forms2__input" placeholder="Pages" required>
<div><small>A page is approximately 275 words.</small></div>
</div>
<div class="col">
<label for="Slides" class="forms2__label">Slides</label>
<input type="number" name="slides" id="Slides" min="0"
class="form-control forms2__input" placeholder="Slides" required>
<div><small>A Slide is approximately 33 words.</small></div>
</div>
<div class="col">
<label for="Problems" class="forms2__label">Problems</label>
<input type="number" name="problems" id="Problems" min="0"
class="form-control forms2__input" placeholder="Problems" required>
<div><small>number of mathematical problems.</small></div>
</div>
<div class="col">
<label for="Sources" class="forms2__label">Sources</label>
<input type="number" name="sources" id="Sources" min="0"
class="form-control forms2__input" placeholder="Sources" required>
<div><small>Number of sources to cite in the paper.</small></div>
</div>
</div>
</div>

<!-- ///// -->
<div class="form-group">
<div class="form-row">
<div class="col">
<label for="instructions" class="forms2__label">Instructions</label>
<textarea name="instructions" id="instructions"
class="form-control forms2__textarea" cols="30" rows="10"
placeholder="instructions" required></textarea>
</div>
</div>
</div>
<!-- /////// -->
<div class="form-group">
<div class="form-row">
<div class="col">
<label for="budget" class="forms2__label">budget</label>
<select name="budget" class="form-control forms2__select" id="" required>
<option value=""> Select one </option>
<option value="$45">$45 (up to 3 pages) </option>
<option value="$150">$150 (up to 10 pages)</option>
<option value="$280">$280(up to 20 pages)</option>
<option value="$480 ">$480 (up to 35 pages)</option>
<option value="$750">$600 (more than 45 pages) </option>
</select>
</div>
<div class="col">
<label for="files" class="forms2__label">files (<small>if
any</small>)</label>
<input type="file" name="file[]" class="form-control-file forms2__files"
id="files" multiple />
</div>
</div>
</div>
<!-- ///// -->
<div class="card-footer">
<button class="btn  btn-block forms2__button" type="submit"
name="submit">Submit</button>
</div>
</form>
</div>
</div>
</div>
</div>
<?php require_once "section_notes.php"?>
</div>
</div>
</div>
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<?php
require_once "../inc/footer_links.php";
?>
<script>
CKEDITOR.replace('instructions');
</script>