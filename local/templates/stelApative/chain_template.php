<?
$title = htmlspecialcharsex($TITLE);
if (strlen($LINK)>0 && $ITEM_INDEX != $ITEM_COUNT-1)
{
    $sChainBody .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope  itemtype="http://schema.org/ListItem">'
            . '<a itemprop="item" href="' . $LINK . '"  title="' . $title . '" >'
            . '<span itemprop="name">' .  $title .'</span>'
            . '<meta itemprop="position" content="'.($ITEM_INDEX+1).'" />'
            . '</a>';
}
else 
{
    $sChainBody .= '<li class="breadcrumb-item active" itemprop="itemListElement" itemscope  itemtype="http://schema.org/ListItem">'
            . '<span itemprop="name">'. $title.'</span>'
            . '<meta itemprop="position" content="'.($ITEM_INDEX+1).'" />'
            . '</li>';
}