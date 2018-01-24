<?php
/**
 * Class Tx_Ableplayer_Div
 */

namespace BZGA\Ableplayer;

use TYPO3\CMS\Core\Database\DatabaseConnection;
use TYPO3\CMS\Core\DataHandling\DataHandler;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class Tx_Ableplayer_Div
 */
class Div
{

    /**
     * Hook for clear page caches on video change
     *
     * @param     $status
     * @param     $table
     * @param     $id
     * @param int $fieldArray
     * @param     $obj
     */
    public function processDatamap_postProcessFieldArray($status, $table, $id, &$fieldArray, &$obj)
    {
        if ($table != 'tx_ableplayer_domain_model_video') {
            return;
        }

        // Clear Cache
        $res = $this->getDatabase()
            ->exec_SELECTquery(
                'tt_content.*',
                'tt_content,tx_ableplayer_video_content',
                'tt_content.uid=tx_ableplayer_video_content.content_uid AND tx_ableplayer_video_content.video_uid=' . intval($id)
            );
        $pages = [];
        while ($row = $this->getDatabase()
            ->sql_fetch_assoc($res)) {
            $pages[] = $row['pid'];
        }
        /** @var DataHandler $cache */
        $cache = GeneralUtility::makeInstance(DataHandler::class);
        if (!is_object($cache->BE_USER)) {
            $cache->BE_USER = $GLOBALS['BE_USER'];
        }
        foreach ($pages as $pid) {
            $cache->clear_cacheCmd($pid);
        }

        // General Storage Folder
        if ($id = self::getGeneralStorageFolder()) {
            $fieldArray['pid'] = $id;
        }
    }

    /**
     * Get the DB
     *
     * @return DatabaseConnection
     */
    protected function getDatabase()
    {
        return $GLOBALS['TYPO3_DB'];
    }

    /**
     * Get the general record storage ID
     *
     * @return int
     */
    public static function getGeneralStorageFolder()
    {
        return self::getConfigurationValue('generalStorageFolder');
    }

    /**
     * Get a configuration value
     *
     * @param $key
     *
     * @return int
     */
    public static function getConfigurationValue($key)
    {
        if (!isset($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['ableplayer'])) {
            return 0;
        }

        $config = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['ableplayer']);
        return intval($config[$key]);
    }

    /**
     * Check if a feature is enabled
     *
     * @param $feature
     *
     * @return bool
     */
    public static function featureEnable($feature)
    {
        /** @var Div $div */
        $div = GeneralUtility::makeInstance(Div::class);
        return $div->featureEnableInternal($feature);
    }

    /**
     * Inernal Check if a feature is enabled
     * Note: You can hook/overwrite it ;)
     *
     * @param $feature
     *
     * @return bool
     */
    public function featureEnableInternal($feature)
    {
        switch ($feature) {
            case 'vimeo':
                // enable for dev preview
                return true;
        }
        return false;
    }
}
