

    </div>
  </div>

  <script>
      $(document).ready( function () {
        $('#myTable').DataTable();
        } );

    </script>



    <script type="text/javascript">
      $(document).ready(function () {
        $(".sub-btn").click(function () {
          $(this).next(".sub-menu").slideToggle();
          $(this).find(".dropdown-icon").toggleClass("rotate");
        });

        $(".close-sidebar").on("click", function () {
          $(".sidebar").animate({ width: "toggle" }, 500);
          $(".show-sidebar").css("display", "block");
        });
        $(".show-sidebar").on("click", function () {
          $(".sidebar").animate({ width: "toggle" }, 500);
          $(".show-sidebar").css("display", "none");
        });
      });
    </script>

  </body>
</html>
