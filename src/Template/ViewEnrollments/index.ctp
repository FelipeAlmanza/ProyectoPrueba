<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enrollment[]|\Cake\Collection\CollectionInterface $enrollments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>   
    </ul>
</nav>
<div class="enrollments index large-9 medium-8 columns content">
    <h3><?= __('Enrollments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('enrollments_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('student_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subject_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($viewEnrollments as $viewEnrollments): ?>
            <tr>
                <td><?= $this->Number->format($viewEnrollments->enrollments_id) ?></td>
                <td><?= $this->Number->format($viewEnrollments->grade) ?></td>
                <td><?= $viewEnrollments->has('student') ? $this->Html->link($viewEnrollments->student->students_id, ['controller' => 'Students', 'action' => 'view', $viewEnrollments->student->students_id]) : '' ?></td>
                <td><?= $viewEnrollments->has('subject') ? $this->Html->link($viewEnrollments->subject->title, ['controller' => 'Subjects', 'action' => 'view', $viewEnrollments->subject->subjects_id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $viewEnrollments->enrollments_id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
