<?php

namespace BMurphy\Models\Base;

/**
 * Base class of the BMurphy\Models\AccessToken entity.
 */
abstract class AccessToken implements \ArrayAccess
{
    protected $id;
    protected $client_id;
    protected $user_id;
    protected $token;
    protected $lifetime;
    protected $refresh_token;
    protected $valid = true;
    protected $created;
    protected $updated;
    protected $client;
    protected $user;

    /**
     * Constructor.
     */
    public function __construct()
    {
    }

    /**
     * Set the id column value.
     *
     * @param mixed $value The column value.
     */
    public function setId($value)
    {
        $this->id = $value;
    }

    /**
     * Returns the id column value.
     *
     * @return mixed The column value.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the client_id column value.
     *
     * @param mixed $value The column value.
     */
    public function setClient_id($value)
    {
        $this->client_id = $value;
    }

    /**
     * Returns the client_id column value.
     *
     * @return mixed The column value.
     */
    public function getClient_id()
    {
        return $this->client_id;
    }

    /**
     * Set the user_id column value.
     *
     * @param mixed $value The column value.
     */
    public function setUser_id($value)
    {
        $this->user_id = $value;
    }

    /**
     * Returns the user_id column value.
     *
     * @return mixed The column value.
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the token column value.
     *
     * @param mixed $value The column value.
     */
    public function setToken($value)
    {
        $this->token = $value;
    }

    /**
     * Returns the token column value.
     *
     * @return mixed The column value.
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the lifetime column value.
     *
     * @param mixed $value The column value.
     */
    public function setLifetime($value)
    {
        $this->lifetime = $value;
    }

    /**
     * Returns the lifetime column value.
     *
     * @return mixed The column value.
     */
    public function getLifetime()
    {
        return $this->lifetime;
    }

    /**
     * Set the refresh_token column value.
     *
     * @param mixed $value The column value.
     */
    public function setRefresh_token($value)
    {
        $this->refresh_token = $value;
    }

    /**
     * Returns the refresh_token column value.
     *
     * @return mixed The column value.
     */
    public function getRefresh_token()
    {
        return $this->refresh_token;
    }

    /**
     * Set the valid column value.
     *
     * @param mixed $value The column value.
     */
    public function setValid($value)
    {
        $this->valid = $value;
    }

    /**
     * Returns the valid column value.
     *
     * @return mixed The column value.
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * Set the created column value.
     *
     * @param mixed $value The column value.
     */
    public function setCreated($value)
    {
        $this->created = $value;
    }

    /**
     * Returns the created column value.
     *
     * @return mixed The column value.
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set the updated column value.
     *
     * @param mixed $value The column value.
     */
    public function setUpdated($value)
    {
        $this->updated = $value;
    }

    /**
     * Returns the updated column value.
     *
     * @return mixed The column value.
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set the client association value.
     *
     * @param mixed $value The association value.
     */
    public function setClient($value)
    {
        $this->client = $value;
    }

    /**
     * Returns the client association value.
     *
     * @return mixed The association value.
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set the user association value.
     *
     * @param mixed $value The association value.
     */
    public function setUser($value)
    {
        $this->user = $value;
    }

    /**
     * Returns the user association value.
     *
     * @return mixed The association value.
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set data by name.
     *
     * @param string $name  The data name.
     * @param mixed  $value The value.
     *
     * @throws \InvalidArgumentException If the data does not exists.
     */
    public function set($name, $value)
    {
        if ('id' == $name) {
            return $this->setId($value);
        }
        if ('client_id' == $name) {
            return $this->setClient_id($value);
        }
        if ('user_id' == $name) {
            return $this->setUser_id($value);
        }
        if ('token' == $name) {
            return $this->setToken($value);
        }
        if ('lifetime' == $name) {
            return $this->setLifetime($value);
        }
        if ('refresh_token' == $name) {
            return $this->setRefresh_token($value);
        }
        if ('valid' == $name) {
            return $this->setValid($value);
        }
        if ('created' == $name) {
            return $this->setCreated($value);
        }
        if ('updated' == $name) {
            return $this->setUpdated($value);
        }
        if ('client' == $name) {
            return $this->setClient($value);
        }
        if ('user' == $name) {
            return $this->setUser($value);
        }

        throw new \InvalidArgumentException(sprintf('The data "%s" does not exists.', $name));
    }

    /**
     * Get data by name.
     *
     * @param string $name  The data name.
     *
     * @return mixed The data.
     *
     * @throws \InvalidArgumentException If the data does not exists.
     */
    public function get($name)
    {
        if ('id' == $name) {
            return $this->getId();
        }
        if ('client_id' == $name) {
            return $this->getClient_id();
        }
        if ('user_id' == $name) {
            return $this->getUser_id();
        }
        if ('token' == $name) {
            return $this->getToken();
        }
        if ('lifetime' == $name) {
            return $this->getLifetime();
        }
        if ('refresh_token' == $name) {
            return $this->getRefresh_token();
        }
        if ('valid' == $name) {
            return $this->getValid();
        }
        if ('created' == $name) {
            return $this->getCreated();
        }
        if ('updated' == $name) {
            return $this->getUpdated();
        }
        if ('client' == $name) {
            return $this->getClient();
        }
        if ('user' == $name) {
            return $this->getUser();
        }

        throw new \InvalidArgumentException(sprintf('The data "%s" does not exists.', $name));
    }

    /**
     * Import data from an array.
     *
     * @param array $array An array.
     *
     * @return void
     */
    public function fromArray($array)
    {
        if (isset($array['id'])) {
            $this->setId($array['id']);
        }
        if (isset($array['client_id'])) {
            $this->setClient_id($array['client_id']);
        }
        if (isset($array['user_id'])) {
            $this->setUser_id($array['user_id']);
        }
        if (isset($array['token'])) {
            $this->setToken($array['token']);
        }
        if (isset($array['lifetime'])) {
            $this->setLifetime($array['lifetime']);
        }
        if (isset($array['refresh_token'])) {
            $this->setRefresh_token($array['refresh_token']);
        }
        if (isset($array['valid'])) {
            $this->setValid($array['valid']);
        }
        if (isset($array['created'])) {
            $this->setCreated($array['created']);
        }
        if (isset($array['updated'])) {
            $this->setUpdated($array['updated']);
        }
    }

    /**
     * Export the data to an array.
     *
     * @return array An array with the data.
     */
    public function toArray($withAssociations = true)
    {
        $array = array();

        $array['id'] = $this->get('id');
        $array['client_id'] = $this->get('client_id');
        $array['user_id'] = $this->get('user_id');
        $array['token'] = $this->get('token');
        $array['lifetime'] = $this->get('lifetime');
        $array['refresh_token'] = $this->get('refresh_token');
        $array['valid'] = $this->get('valid');
        $array['created'] = $this->get('created');
        $array['updated'] = $this->get('updated');
        if ($withAssociations) {
            $array['client'] = $this->get('client') ? $this->get('client')->toArray($withAssociations) : null;
        }
        if ($withAssociations) {
            $array['user'] = $this->get('user') ? $this->get('user')->toArray($withAssociations) : null;
        }

        return $array;
    }

    /**
     * Load the metadata.
     *
     * @param \Doctrine\ORM\Mapping\ClassMetadata $metadata The metadata class.
     */
    static public function loadMetadata(\Doctrine\ORM\Mapping\ClassMetadata $metadata)
    {
        $metadata->setChangeTrackingPolicy(\Doctrine\ORM\Mapping\ClassMetadata::CHANGETRACKING_DEFERRED_EXPLICIT);
        $metadata->setTableName('tokens');
        $metadata->setCustomRepositoryClass('BMurphy\Models\AccessTokenRepository');
        $metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_AUTO);
        $metadata->mapField(array(
            'fieldName' => 'id',
            'type' => 'integer',
            'id' => true,
        ));
        $metadata->mapField(array(
            'fieldName' => 'client_id',
            'type' => 'integer',
            'nullable' => false,
        ));
        $metadata->mapField(array(
            'fieldName' => 'user_id',
            'type' => 'integer',
            'nullable' => true,
        ));
        $metadata->mapField(array(
            'fieldName' => 'token',
            'type' => 'string',
            'length' => 255,
            'nullable' => false,
        ));
        $metadata->mapField(array(
            'fieldName' => 'lifetime',
            'type' => 'integer',
            'nullable' => true,
        ));
        $metadata->mapField(array(
            'fieldName' => 'refresh_token',
            'type' => 'string',
            'length' => 255,
            'nullable' => true,
        ));
        $metadata->mapField(array(
            'fieldName' => 'valid',
            'type' => 'boolean',
        ));
        $metadata->mapField(array(
            'fieldName' => 'created',
            'type' => 'datetime',
            'nullable' => true,
        ));
        $metadata->mapField(array(
            'fieldName' => 'updated',
            'type' => 'datetime',
            'nullable' => true,
        ));
        $metadata->mapManyToOne(array(
            'fieldName' => 'client',
            'targetEntity' => 'BMurphy\\Models\\Client',
            'cascade' => array(
                0 => 'persist',
                1 => 'remove',
            ),
            'inversedBy' => 'tokens',
        ));
        $metadata->mapManyToOne(array(
            'fieldName' => 'user',
            'targetEntity' => 'BMurphy\\Models\\User',
            'cascade' => array(
                0 => 'persist',
                1 => 'remove',
            ),
            'inversedBy' => 'tokens',
        ));
        $metadata->setLifecycleCallbacks(array(
            'prePersist' => array(
                0 => 'updateTimestampableCreated',
            ),
            'postPersist' => array(

            ),
            'preUpdate' => array(
                0 => 'updateTimestampableUpdated',
            ),
            'postUpdate' => array(

            ),
            'preRemove' => array(

            ),
            'postRemove' => array(

            ),
            'onFlush' => array(

            ),
            'postLoad' => array(

            ),
        ));
    }

    /**
     * Throws an \LogicException because you cannot check if data exists.
     *
     * @throws \LogicException
     */
    public function offsetExists($name)
    {
        throw new \LogicException('You cannot check if data exists in the entity.');
    }

    /**
     * Set data in the entity.
     *
     * @param string $name  The data name.
     * @param mixed  $value The value.
     *
     * @see set()
     */
    public function offsetSet($name, $value)
    {
        return $this->set($name, $value);
    }

    /**
     * Returns data of the entity.
     *
     * @param string $name The data name.
     *
     * @return mixed Some data.
     *
     * @see get()
     */
    public function offsetGet($name)
    {
        return $this->get($name);
    }

    /**
     * Throws a \LogicException because you cannot unset data in the entity.
     *
     * @throws \LogicException
     */
    public function offsetUnset($name)
    {
        throw new \LogicException('You cannot unset data in the entity.');
    }

    /**
     * Returns the entity manager.
     *
     * @return \Doctrine\ORM\EntityManager The entity manager.
     */
    static public function entityManager()
    {
        return \Doctrator\EntityManagerContainer::getEntityManager();
    }

    /**
     * Check if the entity manager is clear.
     *
     * @return void
     *
     * @throws \RuntimeException If the entity manager is not clear.
     */
    public function checkEntityManagerIsClear()
    {
        static $reflection;

        $unitOfWork = static::entityManager()->getUnitOfWork();

        if (null === $reflection) {
            $reflection = new \ReflectionProperty(get_class($unitOfWork), 'scheduledForDirtyCheck');
            $reflection->setAccessible(true);
        }

        if ($unitOfWork->hasPendingInsertions() || $reflection->getValue($unitOfWork) || $unitOfWork->getScheduledEntityDeletions()) {
            throw new \RuntimeException('The entity manager is not clear.');
        }
    }

    /**
     * Returns the repository.
     *
     * @return \Doctrine\ORM\EntityRepository The repository.
     */
    static public function repository()
    {
        return static::entityManager()->getRepository('BMurphy\Models\AccessToken');
    }

    /**
     * Create a query builder for this entity name.
     *
     * @param string $alias The alias.
     *
     * @return \Doctrine\ORM\QueryBuilder A query builder
     */
    static public function queryBuilder($alias)
    {
        return static::repository()->createQueryBuilder($alias);
    }

    /**
     * Returns if the entity is new.
     *
     * @return bool If the entity is new.
     */
    public function isNew()
    {
        return !static::entityManager()->getUnitOfWork()->isInIdentityMap($this);
    }

    /**
     * Throws an \RuntimeException if the entity is not new.
     */
    public function checkIsNew()
    {
        if (!$this->isNew()) {
            throw new \RuntimeException('The entity is not new.');
        }
    }

    /**
     * Throws an \RuntimeException if the entity is new.
     */
    public function checkIsNotNew()
    {
        if ($this->isNew()) {
            throw new \RuntimeException('The entity is new.');
        }
    }

    /**
     * Returns if the entity is modified.
     *
     * @return bool If the entity is modified.
     */
    public function isModified()
    {
        return (bool) count($this->getModified());
    }

    /**
     * Throws an \RuntimeException if the entity is not modified.
     */
    public function checkIsModified()
    {
        if (!$this->isModified()) {
            throw new \RuntimeException('The entity is not modified.');
        }
    }

    /**
     * Throws an \RuntimeException if the entity is modified.
     */
    public function checkIsNotModified()
    {
        if ($this->isModified()) {
            throw new \RuntimeException('The entity is modified.');
        }
    }

    /**
     * Returns the entity modifications
     *
     * @return array The entity modifications.
     */
    public function getModified()
    {
        if ($this->isNew()) {
            return array();
        }

        $originalData = static::entityManager()->getUnitOfWork()->getOriginalEntityData($this);

        return array_diff($originalData, $this->toArray());
    }

    /**
     * Refresh the entity from the database.
     *
     * @return void
     */
    public function refresh()
    {
        static::entityManager()->getUnitOfWork()->refresh($this);
    }

    /**
     * Returns the change set of the entity.
     *
     * @return array The change set.
     */
    public function changeSet()
    {
        return static::entityManager()->getUnitOfWork()->getEntityChangeSet($this);
    }

    /**
     * Save the entity.
     */
    public function save()
    {
        $this->checkEntityManagerIsClear();

        $em = static::entityManager();

        $em->persist($this);
        $em->flush();
    }

    /**
     * Delete the entity.
     */
    public function delete()
    {
        $this->checkEntityManagerIsClear();

        $em = static::entityManager();

        $em->remove($this);
        $em->flush();
    }

    public function updateTimestampableCreated()
    {
        $this->setCreated(new \DateTime());
    }

    public function updateTimestampableUpdated()
    {
        $this->setUpdated(new \DateTime());
    }
}