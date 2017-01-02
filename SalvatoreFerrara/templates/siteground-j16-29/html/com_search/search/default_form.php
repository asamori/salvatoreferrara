<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_search
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
$lang = JFactory::getLanguage();
$upper_limit = $lang->getUpperLimitSearchWord();
?>

<!-- SF: inseriti titolo e descrizione generica - INIZIO -->
<div class="items-leading">
	<div class="leading-0">
		<h2>
			<a href="<?php echo $this->baseurl ?>/index.php/ricerca"><?php echo JText::_('SF_SEARCH_PAGE_TITLE')?></a>
		</h2>
	</div>
	<p>
		<?php echo JText::_('SF_SEARCH_PAGE_DESCRIPTION')?>
	</p>
</div>
<br/>
<!-- SF: inseriti titolo e descrizione generica - FINE -->

<form id="searchForm" action="<?php echo JRoute::_('index.php?option=com_search');?>" method="post">

	<fieldset class="word">
		<label for="search-searchword">
			<?php echo JText::_('COM_SEARCH_SEARCH_KEYWORD'); ?>
		</label>
		<input type="text" name="searchword" id="search-searchword" size="30" maxlength="<?php echo $upper_limit; ?>" value="<?php echo $this->escape($this->origkeyword); ?>" class="inputbox" />
		<!-- SF: nascosto pulsante cerca - INIZIO -->
		<!-- <button name="Search" onclick="this.form.submit()" class="button"> --> <?php /* echo JText::_('COM_SEARCH_SEARCH'); */?> <!-- </button> --> 
		<!-- SF: nascosto pulsante cerca - FINE -->
		<input type="hidden" name="task" value="search" />
	</fieldset>
	
	<!-- SF: inserita riga vuota - INIZIO -->
	<br/>
	<!-- SF: inserita riga vuota - FINE -->
	
	<div class="searchintro<?php echo $this->params->get('pageclass_sfx'); ?>">
		<?php if (!empty($this->searchword)):?>
		<p><?php echo JText::plural('COM_SEARCH_SEARCH_KEYWORD_N_RESULTS', $this->total);?></p>
		<?php endif;?>
	</div>

	<fieldset class="phrases">
		<legend><?php echo JText::_('COM_SEARCH_FOR');?>
		</legend>
			<div class="phrases-box">
			<?php echo $this->lists['searchphrase']; ?>
			</div>
			
			<!-- SF: inserita riga vuota - INIZIO -->
			<br/>
			<!-- SF: inserita riga vuota - FINE -->
			
			<div class="ordering-box">
			<label for="ordering" class="ordering">
				<?php echo JText::_('COM_SEARCH_ORDERING');?>
			</label>
			<?php echo $this->lists['ordering'];?>
			</div>
	</fieldset>

	<?php if ($this->params->get('search_areas', 1)) : ?>
		<!-- SF: inserita riga vuota - INIZIO -->
		<br/>
		<!-- SF: inserita riga vuota - FINE -->
		
		<fieldset class="only">
		<legend><?php echo JText::_('COM_SEARCH_SEARCH_ONLY');?></legend>
		<?php foreach ($this->searchareas['search'] as $val => $txt) :
			$checked = is_array($this->searchareas['active']) && in_array($val, $this->searchareas['active']) ? 'checked="checked"' : '';
		?>
		<input type="checkbox" name="areas[]" value="<?php echo $val;?>" id="area-<?php echo $val;?>" <?php echo $checked;?> />
			<label for="area-<?php echo $val;?>">
				<?php echo JText::_($txt); ?>
			</label>
		<?php endforeach; ?>
		</fieldset>
	<?php endif; ?>

	<!-- SF: pulsante cerca - INIZIO -->
	<br/>
	<div class="sf_search_button">
		<button name="Search" onclick="this.form.submit()" class="button"> <?php echo JText::_('COM_SEARCH_SEARCH');?> </button>
	</div>
	<!-- SF: pulsante cerca - FINE -->
	
<?php if ($this->total > 0) : ?>
	<!-- SF: aggiunto il titolo per la sezione contenente i risultati della ricerca - INIZIO -->
	<div class="searchintro sf_search_results_title">
		<p>
			<strong><?php echo JText::_('SF_SEARCH_RESULTS_TITLE');?></strong>
		</p>
	</div>
	<!-- SF: aggiunto il titolo per la sezione contenente i risultati della ricerca - FINE -->
	
	<div class="form-limit sf_search_results"> <!-- SF: aggiunta la classe personalizzata sf_search_results -->
		<label for="limit">
			<?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?>
		</label>
		<?php echo $this->pagination->getLimitBox(); ?>
		<!-- SF: aggiunto testo per paginazione risultati - INIZIO -->
		<label for="limit">
			<?php echo JText::_('SF_SEARCH_RESULTS_FOR_PAGE'); ?>
		</label>
		<!-- SF: aggiunto testo per paginazione risultati - FINE -->
	</div>
<p class="counter">
		<?php echo $this->pagination->getPagesCounter(); ?>
	</p>

<?php endif; ?>

</form>
