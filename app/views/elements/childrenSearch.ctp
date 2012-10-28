<div class="box-01 box bottom" id="childrenSearch" >

    <a class="search_btn"><span class="arrow">&darr;</span> Пошук</a>

    <?php echo $this->Form->create('Search', array('url' => array('controller' => 'children', 'action' => 'index'), 'style' => $wasSearch ? 'display:block' : '')); ?>

    <?php echo $this->Form->hidden('search', array('value' => 1)); ?>

	<?php echo $this->Form->input('first_name', array('size' => 30, 'class' => 'input-text', 'between' => '<br />', 'value' => !empty($searchParams['first_name']) ? $searchParams['first_name'] : '', 'label' => 'Прізвище')); ?>
    <?php echo $this->Form->input('last_name', array('size' => 30, 'class' => 'input-text', 'between' => '<br />', 'value' => !empty($searchParams['last_name']) ? $searchParams['last_name'] : '', 'label' => "Ім'я")); ?>
    <?php echo $this->Form->input('third_name', array('size' => 30, 'class' => 'input-text', 'between' => '<br />', 'value' => !empty($searchParams['third_name']) ? $searchParams['third_name'] : '', 'label' => 'По-батькові')); ?>
    

    <?php echo $this->Form->input('streets', array('label' => 'Вулиця', 'value' => !empty($searchParams['street_id']) ? $searchParams['street_id'] : '', 'id' => 'children_search_street', 'class' => 'input-text', 'between' => '<br />', 'escape' => false, 'type' => 'text')); ?>
    
<div class="input">
    <?php echo $this->Form->input('house', array('size' => 2, 'class' => 'input-text', 'between' => '&nbsp;', 'value' => !empty($searchParams['house']) ? $searchParams['house'] : '', 'label' => 'Будинок&nbsp;', 'div' => false)); ?>           
    <?php echo $this->Form->input('flat', array('size' => 2, 'class' => 'input-text', 'between' => '&nbsp;', 'value' => !empty($searchParams['flat']) ? $searchParams['flat'] : '', 'label' => 'Квартира', 'div' => false, 'after' => '<br />')); ?>
</div>

    <?php echo $this->Form->input('private_house', array('class' => 'input-text', 'between' => '', 'value' => !empty($searchParams['private_house']) ? $searchParams['private_house'] : '', 'type' => 'checkbox', 'label' => '&nbsp;приватний будинок', 'div' => false)); ?>

<div class="input">
	<?php echo $this->Form->input('age_from', array('size' => 2, 'class' => 'input-text', 'between' => '<br />', 'value' => !empty($searchParams['age_from']) ? $searchParams['age_from'] : '', 'label' => 'Вік', 'div' => false)); ?>           
    <?php echo $this->Form->input('age_to', array('size' => 2, 'class' => 'input-text', 'between' => '&nbsp;', 'value' => !empty($searchParams['age_to']) ? $searchParams['age_to'] : '', 'label' => '', 'div' => false, 'before' => ' - ', 'after' => ' років')); ?>
</div>

    <?php echo $this->Form->input('category_id', array('label' => 'Категорія', 'value' => !empty($searchParams['category_id']) ? $searchParams['category_id'] : '', 'options' => array(0 => '- виберіть -') + $categories, 'id' => 'children_search_category_id', 'class' => 'input-text', 'between' => '<br />', 'escape' => false)); ?>

    <?php echo $this->Form->input('source_id', array('label' => 'Джерело внесення в список', 'value' => !empty($searchParams['source_id']) ? $searchParams['source_id'] : '', 'options' => array(0 => '- виберіть -') + $sources, 'id' => 'children_search_source_id', 'class' => 'input-text', 'between' => '<br />', 'escape' => false)); ?>

    <?php echo $this->Form->input('gender', array('label' => 'Стать', 'value' => !empty($searchParams['gender']) ? $searchParams['gender'] : '', 'options' => array(0 => '- виберіть -&nbsp;&nbsp;') + $genders, 'id' => 'children_search_gender', 'class' => 'input-text', 'between' => '<br />', 'escape' => false)); ?>

    <?php echo $this->Form->end(array('label' => 'шукати')); ?>

</div>

<div class="fix"></div>

<?php //debug($searchParams); ?>

<script type="text/javascript">

    $("#children_search_street").tokenInput("/streets/autosuggest", {
        theme: "facebook",
        hintText: "Почніть вводити назву вулиці",
        noResultsText: "Нічого не знайдено",
        searchingText: "Пошук...",
        minChars: 2,
        preventDuplicates: true,
        method: 'POST',
        queryParam: 'data[search]'
        <?php if(!empty($searchParams['streetsJSON'])): ?>
        , prePopulate: <?php echo $searchParams['streetsJSON']; ?>
        <?php endif; ?>
    }); 

</script>

<?php
    if($wasSearch) {
        $searchUrlParams = $searchParams;
        unset($searchUrlParams['street_id']);
        unset($searchUrlParams['streetsJSON']);

        $this->Paginator->options(array('url' => $searchUrlParams));
    }
?>