pipeline {
    agent any
    stages {
        stage('Example') {
            steps {
                echo 'Hello World'
            }
        }
        stage('Manual Approval') {
            steps {
                input message: 'manual approval', parameters: [choice(choices: ['Yes'], name: 'Yes'), choice(choices: ['false'], name: 'No')]
            }
        }
        stage('stage2') {
            steps {
                echo 'stage 2 executed'
            }
        }
      
    }
}
