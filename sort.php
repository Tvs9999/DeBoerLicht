<div class="sort-systeem">
  <form action="" method="GET">
    <div class="row">
      <select name="sort_alphabet" class="form-control">
        <option value=""> --> Selecteer Opties <-- </option>
        <option value="a-z" <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "a-z"){ echo "selected"; } ?> > A-Z </option>
        <option value="z-a"  <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "z-a"){ echo "selected"; } ?> > Z-A </option>
      </select>
      <button type="submit" class="sort-btn"> Sort </button>
    </div>
  </form>
</div>