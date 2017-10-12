    <!-- Bootstrap core JavaScript
      ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <SCRIPT src="scripts/jquery-3.2.1.slim.min.js" crossorigin="anonymous" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"></SCRIPT>
    <SCRIPT src="scripts/popper.min.js"></SCRIPT>
    <SCRIPT src="scripts/bootstrap.min.js"></SCRIPT>
    <script src="scripts/highlight.pack.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <script src="scripts/clipboard.min.js"></script>
    <script>
    // Tooltip

    $('button').tooltip({
      trigger: 'click',
      placement: 'bottom'
    });

    function setTooltip(btn, message) {
      $(btn).tooltip('hide')
        .attr('data-original-title', message)
        .tooltip('show');
    }

    function hideTooltip(btn) {
      setTimeout(function() {
        $(btn).tooltip('hide');
      }, 1000);
    }

    // Clipboard

    var clipboard = new Clipboard('button');

    clipboard.on('success', function(e) {
      setTooltip(e.trigger, 'Copied!');
      hideTooltip(e.trigger);
    });

    clipboard.on('error', function(e) {
      setTooltip(e.trigger, 'Failed!');
      hideTooltip(e.trigger);
    });
    </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <SCRIPT src="scripts/ie10-viewport-bug-workaround.js"></SCRIPT>
  </BODY>
</html>
