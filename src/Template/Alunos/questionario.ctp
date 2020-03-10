<div class="aulas form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Questionário') ?></legend>
        <?php
           
            echo $this->Form->control('Pergunta01',[
                'type'=>'radio',
                'label'=>'Pergunta 01: Você tem dificuldades em utilizar o computador?',
                'id'=>'pergunta01RadioGroup',
                'options'=>[
                        '1' => 'Nenhuma.',
                        '2' => 'Geralmente não.',
                        '3' => 'Mediano.',
                        '4' => 'Geralmente sim.',
                        '5' => 'Bastante.'
                    ]   
                ]
            );
            echo '<br/><br/>';

            //echo $this->Form->control('Pergunta01');
            echo $this->Form->control('Pergunta02',[
                'type'=>'radio',
                'label'=>'Pergunta 02: Você utiliza seu computador para resolver os problemas básicos do seu dia-a-dia?',
                'id'=>'pergunta02RadioGroup',
                'options'=>[
                        '1' => 'Nunca.',
                        '2' => 'Muito pouco.',
                        '3' => 'Mediano.',
                        '4' => 'Frequentemente.',
                        '5' => 'Sempre.'
                    ]   
                ]
            );
            echo '<br/><br/>';

            echo $this->Form->control('Pergunta03',[
                'type'=>'radio',
                'label'=>'Pergunta 03: Você procura saber se existem novos programas que possam te ajudar no dia-a-dia?',
                'id'=>'pergunta03RadioGroup',
                'options'=>[
                        '1' => 'Nunca.',
                        '2' => 'Muito pouco.',
                        '3' => 'Mediano.',
                        '4' => 'Frequentemente.',
                        '5' => 'Sempre.'
                    ]   
                ]
            );
            echo '<br/><br/>';

            echo $this->Form->control('Pergunta04',[
                'type'=>'radio',
                'label'=>'Pergunta 04: Você entende o que é software?',
                'id'=>'pergunta04RadioGroup',
                'options'=>[
                        '1' => 'Definitivamente não.',
                        '2' => 'Já ouvi falar.',
                        '3' => 'Mediano.',
                        '4' => 'Sim.',
                        '5' => 'Perfeitamente.'
                    ]   
                ]
            );
            echo '<br/><br/>';

            echo $this->Form->control('Pergunta05',[
                'type'=>'radio',
                'label'=>'Pergunta 05: Você realiza tarefas repetitivas no computador de modo manual ou automático?',
                'id'=>'pergunta05RadioGroup',
                'options'=>[
                        '1' => 'Nunca.',
                        '2' => 'Muito pouco.',
                        '3' => 'Mediano.',
                        '4' => 'Frequentemente.',
                        '5' => 'Sempre.'
                    ]   
                ]
            );
            echo '<br/><br/>';

            echo $this->Form->control('Pergunta06',[
                'type'=>'radio',
                'label'=>'Pergunta 06: Você acha que jogar videogames é mais divertido do que assistir filmes, séries e programas de TV?',
                'id'=>'pergunta06RadioGroup',
                'options'=>[
                        '1' => 'Definitivamente não.',
                        '2' => 'Provavelmente não.',
                        '3' => 'Mais ou menos.',
                        '4' => 'Sim, um pouco.',
                        '5' => 'Sim, com certeza.'
                    ]   
                ]
            );
            echo '<br/><br/>';

            echo $this->Form->control('Pergunta07',[
                'type'=>'radio',
                'label'=>'Pergunta 07: Você já configurou aparelhos para conectarem na internet?',
                'id'=>'pergunta07RadioGroup',
                'options'=>[
                        '1' => 'Nunca.',
                        '2' => 'Não tenho certeza.',
                        '3' => 'Já tive que fazer configurações simples uma vez.',
                        '4' => 'Sim, uma vez.',
                        '5' => 'Sim, diversas vezes.'
                    ]   
                ]
            );
            echo '<br/><br/>';

            echo $this->Form->control('Pergunta08',[
                'type'=>'radio',
                'label'=>'Pergunta 08: Você mexe com os componentes de hardware do seu computador?',
                'id'=>'pergunta08RadioGroup',
                'options'=>[
                        '1' => 'Nunca.',
                        '2' => 'Muito pouco.',
                        '3' => 'Mediano.',
                        '4' => 'Frequentemente.',
                        '5' => 'Sempre.'
                    ]   
                ]
            );
            echo '<br/><br/>';
            
            echo $this->Form->control('Pergunta09',[
                'type'=>'radio',
                'label'=>'Pergunta 09: Você tem interesse em aprender novas ferramentas que vão te ajudar em um emprego no futuro?',
                'id'=>'pergunta09RadioGroup',
                'options'=>[
                        '1' => 'Definitivamente não.',
                        '2' => 'Muito pouco.',
                        '3' => 'Mais ou menos.',
                        '4' => 'Sim, um pouco.',
                        '5' => 'Sim, bastante.'
                    ]   
                ]
            );
            echo '<br/><br/>';

            echo $this->Form->control('Pergunta10',[
                'type'=>'radio',
                'label'=>'Pergunta 10: Você tem interesse em aprender a mexer com os programas do pacote Office? (Word, Excel, Powerpoint...)',
                'id'=>'pergunta10RadioGroup',
                'options'=>[
                        '1' => 'Definitivamente não.',
                        '2' => 'Muito pouco.',
                        '3' => 'Mais ou menos.',
                        '4' => 'Sim, um pouco.',
                        '5' => 'Sim, bastante.'
                    ]   
                ]
            );
            echo '<br/><br/>';

            echo $this->Form->control('Pergunta11',[
                'type'=>'radio',
                'label'=>'Pergunta 11: Você tem interesse em aprender linguagens de programação para desenvolver sistemas e programas?',
                'id'=>'pergunta11RadioGroup',
                'options'=>[
                        '1' => 'Definitivamente não.',
                        '2' => 'Muito pouco.',
                        '3' => 'Mais ou menos.',
                        '4' => 'Sim, um pouco.',
                        '5' => 'Sim, bastante.'
                    ]   
                ]
            );
            echo '<br/><br/>';

            echo $this->Form->control('Pergunta12',[
                'type'=>'radio',
                'label'=>'Pergunta 12: Você já imaginou alguma vez como você poderia criar um jogo?',
                'id'=>'pergunta12RadioGroup',
                'options'=>[
                        '1' => 'Definitivamente não.',
                        '2' => 'Muito pouco.',
                        '3' => 'Mais ou menos.',
                        '4' => 'Sim, um pouco.',
                        '5' => 'Sim, bastante.'
                    ]   
                ]
            );
            echo '<br/><br/>';

            echo $this->Form->control('Pergunta13',[
                'type'=>'radio',
                'label'=>'Pergunta 13: Você tem interesse em aprender a montar uma rede de computadores?',
                'id'=>'pergunta13RadioGroup',
                'options'=>[
                        '1' => 'Definitivamente não.',
                        '2' => 'Muito pouco.',
                        '3' => 'Mais ou menos.',
                        '4' => 'Sim, um pouco.',
                        '5' => 'Sim, bastante.'
                    ]   
                ]
            );
            echo '<br/><br/>';

            echo $this->Form->control('Pergunta14',[
                'type'=>'radio',
                'label'=>'Pergunta 14: Você tem interesse em aprender medidas de segurança para navegar na internet?',
                'id'=>'pergunta14RadioGroup',
                'options'=>[
                        '1' => 'Definitivamente não.',
                        '2' => 'Muito pouco.',
                        '3' => 'Mais ou menos.',
                        '4' => 'Sim, um pouco.',
                        '5' => 'Sim, bastante.'
                    ]   
                ]
            );
            echo '<br/><br/>';

            echo $this->Form->control('Pergunta15',[
                'type'=>'radio',
                'label'=>'Pergunta 15: Você tem interesse em construir aparatos eletrônicos ou robôs?',
                'id'=>'pergunta15RadioGroup',
                'options'=>[
                        '1' => 'Definitivamente não.',
                        '2' => 'Muito pouco.',
                        '3' => 'Mais ou menos.',
                        '4' => 'Sim, um pouco.',
                        '5' => 'Sim, bastante.'
                    ]   
                ]
            );
            echo '<br/><br/>';
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
