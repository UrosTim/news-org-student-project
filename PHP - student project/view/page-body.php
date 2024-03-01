<article>
    <content>
<!--    Stampanje gresaka ili poruka u telu stranice-->
        <?php   if(!empty($_error)) : ?>
            <error>
                <?= implode('<br>', $_error)  ?>
            </error>
        <?php   endif; ?>
        <?php   if(!empty($_message)) : ?>
            <message>
                <?= implode('<br>', $_message)  ?>
            </message>
        <?php   endif; ?>
        <?php   include_once(DIR_VIEW . $_page_output['view']); ?>
    </content>
</article>