
plugin.tx_gelblauausgabe_ausgabe {
    view {
        # cat=plugin.tx_gelblauausgabe_ausgabe/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:gelblau_ausgabe/Resources/Private/Templates/
        # cat=plugin.tx_gelblauausgabe_ausgabe/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:gelblau_ausgabe/Resources/Private/Partials/
        # cat=plugin.tx_gelblauausgabe_ausgabe/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:gelblau_ausgabe/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_gelblauausgabe_ausgabe//a; type=string; label=Default storage PID
        storagePid =
    }
}
