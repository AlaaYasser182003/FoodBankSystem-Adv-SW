<?php
class ViewAbst {
    function PrintFooter() {
        echo("
        </table>
        </div>
        </div>
        <footer>
            <p>© 2024 Food Bank</p>
        </footer>
        </body>
        </html>");
    }
    function PrintMessage($succ) {
        if ($succ)
            echo('<p style="color: green; text-align: center; font-size:large;">
            Operation was Successfull !</p>');
        else echo('<p style="color: red; text-align: center; font-size:large;">
            Operation was not Executed !</p>');
    }
}