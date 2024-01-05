<input type="file" id="files" multiple="multiple" accept="image/jpeg, image/png, image/jpg">
<output>


  <script>
    document.querySelector("#files").addEventListener("change", (e) => { 
  if (window.File && window.FileReader && window.FileList && window.Blob) {
    const files = e.target.files;
    const output = document.querySelector("output");
    output.innerHTML = "";
    for (let i = 0; i < files.length; i++) {
       if (!files[i].type.match("image")) continue;
        const imgReader = new FileReader();
        imgReader.addEventListener("load", function (event) {
          const imgFile = event.target;
          const img = document.createElement("img");
          img.className = "thumbnail"
          img.src = imgFile.result
          output.appendChild(img);
        });
        imgReader.readAsDataURL(files[i]);
       }
  } else {
    alert("Your browser does not support File API");
  }
});
  </script>